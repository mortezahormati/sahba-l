<?php

namespace App\Http\Controllers\Admin\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Gift;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::orderBy('created_at', 'DESC')->paginate(config('services.paginate.table'));
        $users = User::all();
        $data = [
            'gifts' => $gifts,
            'users' => $users
        ];
        return view('base.admin.dashboard.product.gift.index', $data);
    }

    public static function get_valid_jdate($string)
    {
        $arr = explode('/', explode(' ', $string)[0]);
        $arr[1] = sprintf("%02d", $arr[1]);
        $arr[2] = sprintf("%02d", $arr[2]);

        return implode('/', $arr);
    }

    public function create(Request $request)
    {

        $this->validateForm($request);

        $date_to = Jalalian::fromFormat('Y/m/d', $this->get_valid_jdate($request->date_to));
        $until_date = $date_to->toCarbon();
        $gift = Gift::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'max_uses' => $request->max_uses,
            'user_id' => $request->user_id,
            'description' => $request->description,
            'cart_number' => $request->cart_number,
            'uses' => 0,
            'status' => 1,
            'starts_at' => null,
            'expires_at' => $until_date,
        ]);

        return redirect()->route('gift.index')->with(['flash_message' => __('admin.products.gifts.add-suc')]);

    }

    public function activeGift(Gift $gift)
    {
        $gift->update([
           'active' => 1 ,
           'starts_at' => Carbon::now()
        ]);
        return redirect()->route('users.index')->with(['flash_message' => __('admin.products.gifts.active-suc')]);

    }

    public function changeStatus(Request $request)
    {

        $color = Color::find($request->id);
        $color->status == 1 ? $color->status = 0 : $color->status = 1;
        $color->update();
        if ($color->status == 1) {
            return response()->json([
                'status' => 1,
                'message' => __('admin.colors.enableStatus')
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'message' => __('admin.colors.disableStatus')
            ], 200);
        }
    }

    public function validateForm(Request $request)
    {
        return $this->validate($request, [
            'name' => 'required',
            'amount' => 'required | integer',
            'max_uses' => 'required',
            'user_id' => 'required',
            'cart_number' => 'required',
            'date_to' => 'required',
        ]);
    }

    public function update(Request $request, $id)
    {
        $color = Color::find($id);
        if ($color) {
            $color->update([
                'name' => $request->input('name'),
                'color' => $request->input('color'),
                'status' => $request->has('status') ? 1 : 0,
            ]);
            return redirect()->route('colors.index')->with('flash_message', __('admin.colors.update-suc'));
        } else {
            return redirect()->back()->with('flash_message', ['رنگ مورد نظر یافت نشد.']);
        }
    }

    public function updateForm($id)
    {
        $color = Color::find($id);
        if ($color) {
            $data = [
                'color' => $color
            ];
            return view('base.admin.dashboard.product.color.edit-form', $data);
        }
        return redirect()->back()->with('flash_message', ['این رنگ در صسیستم موجود نمی باشد.']);
    }

    public function destroy(Gift $gift)
    {
        $gift->forceDelete();
        return redirect()->route('coupon.index')->with('flash_message', __('admin.products.gifts.remove-complete'));
    }
}
