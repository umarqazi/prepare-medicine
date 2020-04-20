<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;

class adminController extends Controller
{
    function Index(){

        return view('backend.index');
    }
    
    public function update_email(Request $request){
        $validate = $this->validate($request, [
                'email'=>'required|email'
            ]);
            
        $updated = User::where('id', Auth::user()->id)->update([
                'email'=>$request->email,
                'updated_at'=>Carbon::now()
            ]);
        if($updated == true){
            return redirect()->back()
                            ->withSuccess('Email has been updated');
        }else{
            return redirect()->back()
                            ->withErrors('Sorry - something wrong');
        }
    }
}
