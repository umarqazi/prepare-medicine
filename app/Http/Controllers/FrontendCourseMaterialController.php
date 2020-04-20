<?php

namespace App\Http\Controllers;

use App\video;
use Illuminate\Http\Request;
use Auth;

class FrontendCourseMaterialController extends Controller
{
    function Index(){

        // return view('frontend.course-material');
        return view('frontend.underconstruction');
    }

    function VideosLectures(){

        // $data = video::select()->paginate(24);
        // return view('frontend.videos-lectures',['data'=>$data]);
        
        if(Auth::user()->role == 4){
            //no access as admin
            return back();
        }elseif(Auth::user()->role == 8){
            return view('frontend.underconstruction');
        }else{
            //
            return redirect()->back()
                    ->with('no_access_permission__', 'You can not access, please upgrade your plan');
        }
        
    }

    function Presentations(){
        return view('frontend.underconstruction');

        //return view('frontend.presentations');
    }

    function SuccessStories(){
        return view('frontend.underconstruction');
        //return view('frontend.success-stories');
    }

    function Webinars(){

        // return view('frontend.webinars');
        return view('frontend.underconstruction');
    }
}
