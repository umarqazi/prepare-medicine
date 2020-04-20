<?php

namespace App\Http\Controllers;

use App\comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function Store(Request $request){

        $request->validate([
            'comment' => 'required',
            'question_id' => 'required',
        ]);
        comment::insert([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->f_name.' '.Auth::user()->s_name,
            'comment' => $request->comment,
            'question_id' => $request->question_id,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

    function Drop($id){
        if(comment::findOrFail($id)->user_id == Auth::user()->id){
            comment::findOrFail($id)->delete();
        }
        return back();
    }
}
