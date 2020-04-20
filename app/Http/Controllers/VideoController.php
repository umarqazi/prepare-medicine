<?php

namespace App\Http\Controllers;

use App\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    function Index(){

        $data = video::select()->paginate(24);
        return view('backend.admin-video',['data'=>$data]);
    }

    function Add(Request $request){

        $request->validate([
            'video' => 'required',
            'title' => 'required'
        ]);
        $video = str_replace('watch?v=','embed/',$request->video);

        video::insert([
            'path' => $video,
            'title' => $request->title,
        ]);

        return back();
    }

    function Drop($id){
        if(Auth::user()->role == 4){
            video::where('id',$id)->delete();
        }
        return back();
    }
}
