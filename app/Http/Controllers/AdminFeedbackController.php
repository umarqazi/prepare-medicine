<?php

namespace App\Http\Controllers;

use App\feedback;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    function Index(){
        $data = feedback::select()->paginate(25);
        return view('backend.admin-feedback',['data'=>$data]);
    }

    function Drop($id){

        feedback::findOrFail($id)->delete();
        return back();
    }
    function Hide($id){

        feedback::findOrFail($id)->update([
            'status' => '2'
        ]);
        return back();
    }
    function Show($id){

        feedback::findOrFail($id)->update([
            'status' => '1'
        ]);
        return back();
    }
}
