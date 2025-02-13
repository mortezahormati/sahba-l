<?php

namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Jobs\CustomSend;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Models\UserAddress;
use App\Services\Notification\Notification;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class UserController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $deactive_gifts = $user->gifts()->where('active', '=', 0)->get();
        $active_gifts = $user->gifts()->where('active', '=', 1)->get();
        $data = [
            'user' => $user,
            'deactive_gifts' => $deactive_gifts,
            'active_gifts' => $active_gifts,
        ];
        return view('base.admin.dashboard.users.profile-index', $data);
    }

    public function updateUsersProfile(User $user)
    {
        $deactive_gifts = $user->gifts()->where('active', '=', 0)->get();
        $active_gifts = $user->gifts()->where('active', '=', 1)->get();
        $data = [
            'user' => $user,
            'deactive_gifts' => $deactive_gifts,
            'active_gifts' => $active_gifts,
        ];
        return view('base.admin.dashboard.users.profile-update-index', $data);
    }

    public function deleteUsersProfile(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->forceDelete();
        return \response()->json([
            'message' => __('admin.users.remove')
        ], 200);
    }

    public function sendSmsToSelectedUsersForm(Request $request)
    {
        $user_data = $request->input('form-data');
        $text = $request->input('text');
        $users_id = [];
        foreach ($user_data as $user_id) {
            $users_id[] += $user_id['value'];
        }
        $users = User::whereIn('id', $users_id)->get();
        $this->sendingSms($users, $text);
        return \response()->json([
            'message' => __('admin.users.customSms-suc')
        ], 200);
    }

    public function removeAddress(UserAddress $id)
    {
        $id->delete();
        return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.remove-profile-address'));
    }

    public function adminRemoveAddress(UserAddress $id)
    {
        $id->delete();
        return redirect()->route('users.index')->with('flash_message', __('admin.users.remove-profile-address'));
    }


    public function sendingSms($users, $text)
    {
        foreach ($users as $user) {
            CustomSend::dispatch($user, $text);
        }
    }

    public function editUsersRoles(User $user)
    {
        $user = $user->load('roles');
        $roles = Role::all();
        $data = [
            'user' => $user,
            'roles' => $roles
        ];
        return view('base.admin.dashboard.users.user-roles-index', $data);
    }

    public function storeUsersRoles(User $user , Request $request){
        $user->refreshRole($request->input('roles'));
        return redirect()->route('users.index')->with('flash_message' , __('admin.users.roles-updated'));
    }


    public function updatingUsersProfile(User $user, Request $request)
    {

        //update name
        if ($request->has('name') and $request->has('family')) {
            $this->validateUserNameForm($request);
            $user->update([
                'name' => $request->name,
                'family' => $request->family,
            ]);
            return redirect()->route('update-user-profile', $user)->with('flash_message', __('admin.users.update-user-name'));
        }

        //national code

        if ($request->has('national_code')) {
            $this->validateNationalCodeForm($request);
            $user->update([
                'national_code' => $request->national_code
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-national-code'));
        }


        if ($request->has('phone_number')) {
            $this->validatePhoneNumberForm($request, $user);
            $user->update([
                'phone_number' => $request->phone_number
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-phone-number'));
        }

        //email
        if ($request->has('email')) {
            if (($request->input('email') != $user->email) and !is_null($user->email)) {

                $user->update([
                    'email_verified_at' => null
                ]);
            }
            $this->validateEmailForm($request, $user);
            $user->update([
                'email' => $request->email
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-email'));
        }


        if ($request->has('birth_day')) {
            $this->validateBirthdayForm($request);
//            dd($request->birth_day);
            $birth_day = Jalalian::fromFormat('Y/m/d', $this->get_valid_jdate($request->birth_day));
            $age_time = $birth_day->toCarbon();
            $user->update([
                'birth_day' => $age_time
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-birth-day'));
        }

        if ($request->has('password') and $request->has('password_confirmation')) {
            $this->validatePasswordForm($request);
            $pass_make = $request->password;
            $make_pass = password_hash($pass_make, PASSWORD_DEFAULT);
            $user->update([
                'real_lw_pass' => $pass_make,
                'rehashing_password_lw' => $make_pass,
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-password'));
        }

        if ($request->has('company_phone_number') and $request->has('company_national_code') and $request->has('company_name') and $request->has('job')) {
            $this->validateJuridicalKnowledgeForm($request);
            $company = Company::create([
                'name' => $request->company_name,
                'phone_number' => $request->company_phone_number,
                'national_code' => $request->company_national_code,
                'job' => $request->job,
            ]);
            if ($company) {
                $user->update([
                    'company_id' => $company->id,
                ]);
            }
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.add-juridicalKnowledge'));
        }
        if ($request->has('address') and $request->has('postal_code')) {
            $this->validateAddressForm($request);
            UserAddress::create([
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'const_phone_number' => $request->const_phone_number,
                'delivered_name' => $request->delivered_name,
                'user_id' => $user->id
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.add-address'));
        }
        if ($request->has('profile_img')) {
            $file = $request->file('profile_img');
            $year = now()->year;
            $month = now()->month;
            $full_name = $year . '-' . $month . basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . Str::random(3) . '.' . $file->getClientOriginalExtension();
            $user->update([
                'profile_img' => "$full_name"
            ]);
            $file->move(public_path('/Users/'), $full_name);
            return redirect()->back()->with('flash_message', __('admin.users.update-profile-img'));
        }
    }

    public function storeUsersProfile(Request $request)
    {
        $user = auth()->user();
        //update name
        if ($request->has('name') and $request->has('family')) {
            $this->validateUserNameForm($request);
            $user->update([
                'name' => $request->name,
                'family' => $request->family,
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-user-name'));
        }
        //national code
        if ($request->has('national_code')) {
            $this->validateNationalCodeForm($request);
            $user->update([
                'national_code' => $request->national_code
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-national-code'));
        }
        //phone number
        if ($request->has('phone_number')) {
            $this->validatePhoneNumberForm($request, $user);
            $user->update([
                'phone_number' => $request->phone_number
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-phone-number'));
        }
        //email
        if ($request->has('email')) {

            if (($request->input('email') != $user->email) and !is_null($user->email)) {
                $user->update([
                    'email_verified_at' => null
                ]);
            }
            $this->validateEmailForm($request, $user);
            $user->update([
                'email' => $request->email
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-email'));
        }
        //birth day
        if ($request->has('birth_day')) {
            $this->validateBirthdayForm($request);
//            dd($request->birth_day);
            $birth_day = Jalalian::fromFormat('Y/m/d', $this->get_valid_jdate($request->birth_day));
            $age_time = $birth_day->toCarbon();
            $user->update([
                'birth_day' => $age_time
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-birth-day'));
        }
        //password
        if ($request->has('password') and $request->has('password_confirmation')) {
            $this->validatePasswordForm($request);
            $pass_make = $request->password;
            $make_pass = password_hash($pass_make, PASSWORD_DEFAULT);
            $user->update([
                'real_lw_pass' => $pass_make,
                'rehashing_password_lw' => $make_pass,
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-password'));
        }
        //company phone number
        if ($request->has('company_phone_number') and $request->has('company_national_code') and $request->has('company_name') and $request->has('job')) {
            $this->validateJuridicalKnowledgeForm($request);
            $company = Company::create([
                'name' => $request->company_name,
                'phone_number' => $request->company_phone_number,
                'national_code' => $request->company_national_code,
                'job' => $request->job,
            ]);
            if ($company) {
                $user->update([
                    'company_id' => $company->id,
                ]);
            }
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.add-juridicalKnowledge'));
        }
        //address
        if ($request->has('address') and $request->has('postal_code')) {
            $this->validateAddressForm($request);
            UserAddress::create([
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'const_phone_number' => $request->const_phone_number,
                'delivered_name' => $request->delivered_name,
                'user_id' => $user->id
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.add-address'));
        }
        //profile_img
        if ($request->has('profile_img')) {
            $file = $request->file('profile_img');
            $year = now()->year;
            $month = now()->month;
            $full_name = $year . '-' . $month . basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . Str::random(3) . '.' . $file->getClientOriginalExtension();
            $user->update([
                'profile_img' => "$full_name"
            ]);
            $file->move(public_path('/Users/'), $full_name);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.update-profile-img'));
        }
    }


    public function CompanyUpdate(User $user, Request $request)
    {

        if ($request->input('name')) {

            //validate
            $this->validateCompanyName($request);
            $user->company->update([
                'name' => $request->input('name')
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.company.update-name'));

        }
        if ($request->input('job')) {
            $this->validateCompanyJob($request);

            $user->company->update([
                'job' => $request->input('job')
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.company.update-job'));

        }
        if ($request->input('national_code')) {
            $this->validateCompanyNationalCode($request);

            $user->company->update([
                'national_code' => $request->input('national_code')
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.company.update-national-code'));

        }
        if ($request->input('phone_number')) {
            $this->validateCompanyPhoneNumber($request);
            $user->company->update([
                'phone_number' => $request->input('phone_number')
            ]);
            return redirect()->route('user-profile.index')->with('flash_message', __('admin.users.company.update-phone-number'));

        }


    }

    public static function get_valid_jdate($string)
    {
        $arr = explode('/', explode(' ', $string)[0]);
        $arr[1] = sprintf("%02d", $arr[1]);
        $arr[2] = sprintf("%02d", $arr[2]);
        return implode('/', $arr);
    }

    protected function validateUserNameForm(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'family' => 'required',
        ]);
    }

    protected function validateCompanyName(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    }

    protected function validateCompanyJob(Request $request)
    {
        $request->validate([
            'job' => 'required'
        ]);
    }

    protected function validateCompanyNationalCode(Request $request)
    {
        $request->validate([
            'national_code' => 'required'
        ]);
    }

    protected function validateCompanyPhoneNumber(Request $request)
    {
        $request->validate([
            'phone_number' => 'required'
        ]);
    }

    protected function validatePasswordForm($request)
    {
        $request->validate([
            'password' =>
                [
                    'required',
                    'min:6',
                    'confirmed'
                ],
        ]);
    }

    protected function validateNationalCodeForm($request)
    {
        $request->validate([
            'national_code' => 'required',
        ]);
    }

    protected function validateBirthdayForm($request)
    {
        $request->validate([
            'birth_day' => 'required',
        ]);
    }

    protected function validatePhoneNumberForm($request, $user)
    {
        $request->validate([
            'phone_number' => 'required | unique:users,phone_number,' . $user->id

        ]);
    }

    protected function validateEmailForm($request, $user)
    {
        $request->validate([
            'email' => 'unique:users,email,' . $user->id
        ]);
    }

    protected function validateJuridicalKnowledgeForm($request)
    {
        $request->validate([
            'company_name' => 'required',
            'job' => 'required',
            'company_phone_number' => 'required',
            'company_national_code' => 'required',
        ]);
    }

    protected function validateAddressForm($request)
    {
        $request->validate([
            'address' => 'required',
            'postal_code' => 'required|numeric',
        ]);
    }

    //            $validator= \Validator::make($request->all(), [
//                'name' => 'required',
//                'family' => 'required',
//            ]);
//            if ($validator->fails()) {
//                return response()->json([
//                    'error' => $validator->errors()->all()
//                ]);
//            }
}
