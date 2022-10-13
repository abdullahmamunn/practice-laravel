<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserInfoController extends Controller
{
    public function getUserForm()
    {
        return view('user-form');
    }

    public function submitData(Request $request)
    {
        $data = $request->all();
         $request->validate([
             'name' => 'required',
             'email' => 'required|unique:user_infos,email',
             'phone' => 'required',
         ]);

         
         if($data['status'] == 'on')
         {
             $data['status'] = 1;
         }
        //  dd($data);
        //  UserInfo::create($data);

         $new_user = new UserInfo();
         $new_user->name = $request->name;
         $new_user->email = $request->email;
         $new_user->phone = $request->phone;
         $new_user->address = $request->address;
         $new_user->save();

         return redirect()->route('show.data');
    }

    public function getData()
    {
        // $users = DB::table('user_infos')->find(1);

        $users = UserInfo::latest()->paginate(5);
        // return $users;
        // $users = UserInfo::where('status',1)->get();
        return view('get-data',compact('users'));
    }

    public function editUser($id)
    {
        // $users = DB::table('user_infos')->find($id);
        $user = UserInfo::findOrFail($id);
        return view('edit-user',compact('user'));
    }
    public function updateUser($id,Request $request)
    {
        $data = $request->all();
        // return $data;
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:user_infos,email,'.$id,
            'phone' => 'required',
        ]);

         $user = UserInfo::find($id);
        //  $user->name = $request->name;
        //  $user->email = $request->email;
        //  $user->phone = $request->phone;
        //  $user->address = $request->address;

          if(isset($data['status']) == 'on'){
               $data['status'] = 1;
          }else{
             $data['status'] = 0;
          }
        //   return $data;
            $user->update($data);
        //  return $user->name;
        // $user->save();
        return redirect()->route('show.data',['id' => $user->id]);
    }

    public function deleteUser($id)
    {
        $user = UserInfo::find($id);
        if($user){
            $user->delete();
            return redirect()->back();
        }
        else{
            return "user not found";
        }
    }

    public function checkAge($age)
    {
        return $age;
    }
}
