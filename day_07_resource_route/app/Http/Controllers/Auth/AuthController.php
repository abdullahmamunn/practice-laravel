<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\EmailVerification;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registationForm()
    {
        return view('auth.registration');
    }

    public function UserRegistationFormSubmit(Request $request)
    {
        // return $request->all();
       $request->validate([
           'name' => 'required',
           'email' => 'required|unique:users,email',
           'password' => 'required|confirmed|min:6'
       ]);


    //    $data = $request->except('_token','password_confirmation');

       $new_user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'remember_token' => Str::random(40)
       ]);

    //   Mail::to($request->email)->send(new EmailVerfication($new_user));
    Mail::to($request->email)->send(new EmailVerification($new_user));
    return redirect('login')->with('success','User Create Successfully, PLease check your email active account');

    }

    public function UserLoginFormSubmit(Request $request)
    {
        // return $request->all();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

       $isActive = User::where('email',$request->email)->first();
        if($isActive !=null){
            if($isActive->status == 0){
                return redirect()->route('login')->with('error','Your account is not active, please active your account');
            }
        }

       $user_credentials = $request->only('email','password');
       if(Auth::attempt($user_credentials)){
           return redirect()->route('dashboard')->with('success','Login successfull, Mr.');
       }
       return redirect()->route('login')->with('error','Your credential doesnot match');


  }





    public function dashboard()
    {
        return view('auth.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function verifyAccount($token = null)
    {
        $check_token = User::where('remember_token',$token)->first();
        if(!$check_token){
            return "token doesn't match";
        }
        $check_token->status = 1;
        $check_token->remember_token = null;
        $check_token->save();
        return "Account is activated";

    }
}
