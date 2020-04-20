<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Course;

class FrontendHomeController extends Controller
{
    function Index (){
    	$blogs = Blog::orderBy('id', 'DESC')->get();
    	$course_list = Course::orderBy('id', 'ASC')->get();
        return view('frontend.index', compact('blogs', 'course_list'));
    }
}
