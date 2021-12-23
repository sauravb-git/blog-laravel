<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    //

    public function CPassword(){
        return view('admin.body.change_password');
    }

    public function UPassword(Request $request){

         $vailidateData = $request->validate([
             'oldpassword' => 'required',
             'password' => 'required|confirmed'
         ]);


         $hashedPassword = Auth::user()->password;
         if(Hash::check($request->oldpassword,$hashedPassword)){
             $user = User::find(Auth::id());
             $user->password = Hash::make($request->password);
             $user->save();
             Auth::logout();
             return redirect()->route('login')->with('success','Passsword is
             Changed Successfull');
         }
         else{
            return redirect()->back()->with('error','Current Password is
            Invalid');
         }
     }

     public function UProfile(){
         if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
               return view('admin.body.update_profile',compact('user'));
            }
         }
     }

     public function UPUProfile(Request $request){
         $user = User::find(Auth::user()->id);
         if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();

            return redirect()->back()->with('success','User Profile Is Updated');
         }else{
            return redirect()->back();

         }

     }



}
