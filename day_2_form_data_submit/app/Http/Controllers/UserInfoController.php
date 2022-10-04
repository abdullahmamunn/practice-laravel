<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function getUserForm()
    {
        return view('user-form');
    }

    public function submitData(Request $request)
    {
        // return $request->all();
         $request->validate([
             'name' => 'required',
             'email' => 'required|unique:user_infos,email',
             'phone' => 'required',
         ]);

         $new_user = new UserInfo();
         $new_user->name = $request->name;
         $new_user->email = $request->email;
         $new_user->phone = $request->phone;
         $new_user->address = $request->address;
         $new_user->save();

         return redirect()->back();
    }
}
