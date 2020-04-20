<?php

namespace App\Http\Controllers;

use App\question;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function Test($id){

        // $data = question::select()->where('cat_id',$id)->simplePaginate(1);
        // $total_question = question::where('cat_id',$id)->count();
        // if(isset($_GET['page'])){
        //     return ['data'=>$data,'total_question'=>$total_question,'page'=>$_GET['page']];
        // }

        $data = question::all()->random(2);
        return $data;
    }
}
