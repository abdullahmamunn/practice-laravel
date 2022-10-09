<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function dashboard()
    {
        if(Auth::check()){
            return view('auth.dashboard');
        }
  
        return redirect('login')->withSuccess('You are not allowed to access');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function submitRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        
        $data = $request->all();

        User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
        ]);
        return redirect('dashboard')->withSuccess('You have signed-in');
    }

    public function submitLogin(Request $request)
    {
        // return $request->all();
         $request->validate([
            'email' => 'required',
            'password' => 'required',
         ]);

         $credentials = $request->except('_token');
         if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
         }
         return redirect()->back();
    }

    public function signOut()
    {
        // dd(Auth::user());
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
