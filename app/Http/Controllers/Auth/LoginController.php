<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\GoogleRecaptcha;
use App\Rules\Recaptcha;
use App\Services\Notification\Notification;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use mysql_xdevapi\Session;
use function GuzzleHttp\Promise\all;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $this->validateMobileLoginForm($request);
       
        $created_token = Token::where('phone_number', $request->phone_number)->first();

      
        if (!$created_token) {
            $token_code = $this->generateNewTokenCodeAndSendSms($request->phone_number);

            $token = $this->createTokenForNumber($request, $token_code);
            $data = [
                'token_code' => $token_code,
                'phone_number' => $request->input('phone_number'),
                'time' => "3:00"  ,
                'sms_flash' => true
            ];
           

            return view('auth.register', $data);
        }
//        dd(Carbon::now()->diffInMinutes($created_token->token_expire_time ) > 0 ? Carbon::now()->addMinute()->diffInMinutes($created_token->token_expire_time)->format("i:s") : "0:00" );
        $data = [
            'token_code' => $created_token->token,
            'phone_number' => $request->input('phone_number'),
            'time' =>  "3:00", // must corbon there
            'sms_flash' => false
        ];
        return view('auth.register', $data);
    }

    public function createTokenForNumber(Request $request, $token_code)
    {
        return Token::create([
            'phone_number' => $request->phone_number,
            'token' => $token_code,
            'token_expire_time' => now()->addMinutes(3),
        ]);
    }

    public function validateMobileLoginForm(Request $request)
    {
        $request->validate([
            'phone_number' => 'required | numeric |phone:IR,mobile',
            'g-recaptcha-response' => ['required' , new GoogleRecaptcha]
        ],[
            'g-recaptcha-response.required' => __('auth.recaptcha')
        ]);
    }

    public function generateNewTokenCodeAndSendSms($phone_number)
    {
        $random_token = rand(20000, 90000);
        $notification = resolve(Notification::class);
        $test = $notification->sendSms($phone_number, $random_token);
        return $random_token;
    }

    public function loginWithMobile(Request $request)
    {
        //check token code if correct send to create_password

        $created_token = Token::where('phone_number', $request->phone_number)->first();

//        dd(123 , $created_token, $request->all() ,$request->input('token_code') == $created_token->token ,  ($created_token->token_expire_time > Carbon::now()));
        if ($request->input('token_code') == $created_token->token && ($created_token->token_expire_time > Carbon::now())) {
            $this->registerUserWithoutPass($request, $created_token);

        }

       

        return redirect()->back()->with(['wrongToken' => __('auth.wrongToken')]);
    }

    public function loginWithMobileSetPassword(Request $request)
    {

        // $this validate user exists
        $this->validatePasswordPhoneNumber($request);
        //check pass and phone
        $user = User::where('phone_number' , $request->phone_number)->first();
//        dd(password_verify($request->password, $user->rehashing_password_lw) , $request->password ,$user->rehashing_password_lw );
        if($user and password_verify($request->password, $user->rehashing_password_lw)){
            session()->regenerate();
            Auth::login($user);
            return redirect()->route('home')->with(['loginSuccess' => __('auth.login.success')]);
        }
        //
        return redirect()->back()->with(['passwordWrong' => __('auth.passwordWrong')]);
    }

    protected function validatePasswordPhoneNumber(Request $request){
        $request->validate(['phone_number' => [ 'required' , 'exists:users,phone_number']]);
    }
    public function registerUserWithoutPass(Request $request, Token $created_token)
    {
        //check token code if correct send to create_password
        $user = User::where('phone_number', $request->phone_number)->first();
        if ($user) {
            Auth::login($user);
            $created_token->delete();
            return redirect()->route('home');
        } else {
            $pass_make = $request->phone_number . rand(100, 5000) ;
            $make_pass = password_hash($pass_make, PASSWORD_DEFAULT);
            $new_user = User::create([
                'name' => $request->phone_number,
                'email' => null,
                'rehashing_password_lw' => $make_pass,
                'real_lw_pass' => $pass_make ,
                'password' => Hash::make($make_pass),
                'phone_number' => $request->phone_number,
                'token_code' => null,
                'token_expire_time' => null,
            ]);
            Auth::login($new_user);
            $created_token->delete();
            return redirect()->route('home');
        }

    }

    public function resetGenerateTokenCode($token, $phone_number)
    {
//        dd(123);
        $created_token = Token::where('phone_number', $phone_number)->first();

        if ($created_token and $created_token->token_expire_time > Carbon::now()) {
            return response()->json([
                'message' => __('auth.alreadySent'),
                'type' => 'alreadySent'
            ]);
        }
        // deleted created_token
        if ($created_token) {
            $created_token->delete();
        }
        $token_code = $this->generateNewTokenCodeAndSendSms($phone_number);
        //create again token code
        Token::create([
            'phone_number' => $phone_number,
            'token' => $token_code,
            'token_expire_time' => now()->addMinutes(3),
        ]);

        return response()->json([
            'message' => __('auth.againSendToken'),
            'type' => 'sentAgain'
        ]);


    }

    public function loginWithUserPassword($phone_number)
    {
//        dd($phone_number);
        $data = [
            'phone_number' => $phone_number,
            'hash_number' => Hash::make($phone_number)
        ];
        return view('auth.loginWithPasswordForm', $data);
    }

    public function username()
    {
        return 'phone_number';
    }
}
