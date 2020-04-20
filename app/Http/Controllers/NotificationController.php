<?php

namespace App\Http\Controllers;

use App\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NotificationController extends Controller
{
    function Index(){

        $data = notification::select()->orderBy('id',"desc")->paginate(20);
        return view('backend.notification',['data'=>$data]);
    }

    function NotificationAdd(Request $request){

        $request->validate([
            'title' => "required",
            'description' => "required",
            'expired' => "required",
        ]);
        notification::insert([
            'title' => $request->title,
            'description' => $request->description,
            'expired' => $request->expired,
            'noti_from' => 'Admin',
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success',"Successfully Added Nitification");
    }

    function NotificationEdit(Request $request){

        $request->validate([
            'title' => "required",
            'description' => "required",
            'expired' => "required",
        ]);
        notification::where('id',$request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'expired' => $request->expired,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success',"Successfully Edited Nitification");
    }

    function NotificationDrop($id){
        if(Auth::user()->role == '4'){
            notification::where('id',$id)->delete();
        }
        return back()->with('success',"Successfully Droped Nitification");
    }

    function UserNotification(){
        if(Auth::user()->role >= 2){
            $data = notification::where('expired','>=',date('Y-m-d'))->orderBy('id',"desc")->get();
            return view('frontend.notification',['data' => $data]);
        }
    }
}
