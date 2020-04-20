<?php

namespace App\Http\Controllers;
use App\Course;

use Illuminate\Http\Request;

class FrontendCourseController extends Controller
{
    function Index(){
        $course_list = Course::orderBy('id', 'ASC')->get();
        return view('frontend.course', compact('course_list'));
    }

    function Plab1(){

        //return view('frontend.plab-1');
        return view('frontend.underconstruction');
    }

    function Plab2(){

        //return view('frontend.plab-2');
        return view('frontend.underconstruction');
    }

    function UnderConstruction(){

        return view('frontend.underconstruction');
    }

}
