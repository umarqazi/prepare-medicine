<?php

namespace App\Http\Controllers;

use App\ui_team_work;
use Illuminate\Http\Request;

class FrontendAboutUsController extends Controller
{
    function Index (){

        $data = ui_team_work::findOrFail(7)->content;
        return view('frontend.about-us',['data'=>$data]);
    }
}
