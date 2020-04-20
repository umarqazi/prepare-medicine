<?php

namespace App\Http\Controllers;

use App\categoty;
use App\community;
use App\user_question;
use Illuminate\Http\Request;
use Auth;

class FrontendPlabCommunityController extends Controller
{
    function Index(){

        return view('frontend.community');
    }

    function WhatsAppGroups(){
        if (Auth::user()->role == 1 || Auth::user()->role == 4) {
            //no access for non verified users/admin
            return back();
        }
        
        $data = NULL;
        if (Auth::user()->role == 2) {
            //trail no access
            return redirect()->back()
                ->with('no_access_permission__', 'You can not access, please upgrade your plan');
        }else{
            $data = community::select()->where('status',"1")->get();
        }
        
        return view('frontend.whatsApp-groups',['data'=>$data]);
    }

    function FacebookGroups(){
         if (Auth::user()->role == 1 || Auth::user()->role == 4) {
            //no access for non verified users/admin
            return back();
        }
        
        $data = NULL;
        if (Auth::user()->role == 2) {
            //trail no access
            return redirect()->back()
                ->with('no_access_permission__', 'You can not access, please upgrade your plan');
        }else{
            $data = community::select()->where('status',"2")->get();
        }
        
        
        return view('frontend.facebook-groups',['data'=>$data]);
    }

    function AddQuestions(){

        return view('frontend.add-questions');
    }

    function CommunityQuestion(){

        
        $data = categoty::select()->paginate(48);
        
        return view('frontend.community-question',['data'=>$data]);
    }
}
