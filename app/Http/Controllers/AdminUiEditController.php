<?php

namespace App\Http\Controllers;

use App\ui_team_work;
use Illuminate\Http\Request;

class AdminUiEditController extends Controller
{

    function Volunteer(){

        $data = ui_team_work::findOrFail(9);
        return view('backend.volunteer',['data'=>$data]);
    }

    function OurTeam(){

        $data = ui_team_work::findOrFail(8);
        return view('backend.our-team',['data'=>$data]);
    }

    function AboutUs(){

        $data = ui_team_work::findOrFail(7);
        return view('backend.about-us',['data'=>$data]);
    }

    function AboutExam(){

        $data = ui_team_work::findOrFail(1);
        return view('backend.about-exam',['data'=>$data]);
    }

    function PlabNews(){

        $data = ui_team_work::findOrFail(5);
        return view('backend.plab-news',['data'=>$data]);
    }

    function UsefulLink(){

        $data = ui_team_work::findOrFail(2);
        return view('backend.Useful-link',['data'=>$data]);
    }

    function WorkForUs(){

        $data = ui_team_work::findOrFail(3);
        return view('backend.work-for-us',['data'=>$data]);
    }

    function Disclaimer(){

        $data = ui_team_work::findOrFail(4);
        return view('backend.disclaimer',['data'=>$data]);
    }

    function FAQ(){

        $data = ui_team_work::findOrFail(6);
        return view('backend.faq',['data'=>$data]);
    }

    function LabValue(){

        $data = ui_team_work::findOrFail(10);
        return view('backend.lab-value',['data'=>$data]);
    }

    //Uppdate for all ui work

    function UpdateUi(Request $request){

        $request->validate([
            'content' => 'required',
        ]);

        ui_team_work::where('id',$request->id)->update(['content'=>$request->content]);
        return back()->with(['success'=>"Successfully Updated Your Content !!"]);
    }

}
