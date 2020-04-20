<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    function Index(){
        return view('auth.passwords.change-password');
    }
    
    function Change(Request $request){
        $request->validate([
            'old_password' => "required",
            'new_password' => "required|min:8",
            'confirm_password' => "required|same:new_password",
        ]);
        if(Hash::check($request->old_password, Auth::user()->password)){
            User::where('id',Auth::user()->id)->update([
                'password' => Hash::make($request->new_password),
            ]);
        }else{
            return back()->with('error',"New Password does not matches with your current password");
        }
        return back()->with('success',"Password Changed successfully");
    }
}
