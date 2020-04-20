<?php

namespace App\Http\Controllers;

use App\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    function Insert(Request $request){
        $request->validate([
            'name'     => "required",
            'feedback' => "required",
            'id' => "required|numeric",
        ]);
        feedback::insert([
            'user_name' => $request->name,
            'feedback'  => $request->feedback,
            'status'    => '1',
            'user_id'   => $request->id,
        ]);

        return back();
    }
    function Drop($user_id,$feedback_id){

        if(Auth::user()->id == $user_id){
            feedback::findOrFail($feedback_id)->delete();
        }
        return back();
    }
    function Update(Request $request){
        if(Auth::user()->id == feedback::findOrFail($request->id)->user_id){
            feedback::findOrFail($request->id)->update([
                'feedback'  => $request->feedback,
            ]);
        }
        return redirect('our-team/feedback');
    }
}
