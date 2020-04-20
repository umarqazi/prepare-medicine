<?php

namespace App\Http\Controllers;

use App\flag;
use App\question;
use App\ui_team_work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlagController extends Controller
{
    function Add($id){

        flag::insert([
            'user_id' => Auth::user()->id,
            'ques_id' => $id,
            'cat_id' => question::findOrFail($id)->cat_id,
            'status' => '1',
        ]);

        return back();
    }

    function Drop($id){
        if(Auth::user()->id == flag::findOrFail($id)->user_id){
            flag::where('id',$id)->delete();
        }
        return back();
    }

    function Question($id){

        $data = question::select()->where('id',$id)->simplePaginate(1);
        $total_question = NULL;
        $lab = ui_team_work::findOrFail(10)->content;
        $action_single = "revision/compare/single" ;
        $action_multi  = "revision/compare/multi" ;

        if (Auth::user()->role == 2) {
            //trail subscriber
            $counter = question::where('cat_id',$id)->count();
            if ($counter > 30) {
                $total_question = 30;
            }else{
                $total_question = $counter;
            }
        }else{
            $total_question = question::where('cat_id',$id)->count();
        }
        

        return view('frontend.revision-exam-category',['data'=>$data,'total_question'=>$total_question,'id'=>$id,'lab'=>$lab,'action_single'=>$action_single,'action_multi'=>$action_multi]);
    }
}
