<?php

namespace App\Http\Controllers;

use App\question;
use App\recallmodel;
use App\mockquestion;
use App\ui_team_work;
use App\mockinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecallExamController extends Controller
{
    function Index(){

        // $continue_data = mockinformation::select()->where('user_id',Auth::user()->id)->where('status','1')->where('year',date('Y'))->where('type','3')->get();
        // $expired_data = mockinformation::select()->where('user_id',Auth::user()->id)->where('status','2')->where('type','3')->where('year',date('Y'))->get();
        // $exists_data = mockinformation::where('user_id',Auth::user()->id)->where('status','1')->where('year',date('Y'))->where('type','3')->count();
        // $available_exam = recallmodel::all();
        
        // $array[] = null;
        // foreach($expired_data as $key => $value){
        //     $array[$key] = $value->recall_id;
        // }

        // return view('frontend.recall-exam',['expired_data'=>$expired_data,'continue_data'=>$continue_data,'exists_data'=>$exists_data,'available_exam'=>$available_exam,'array'=>$array]);
        $data = NULL;
        if (Auth::user()->role == 2) {
            $data = recallmodel::where('status','1')
                            ->orderBy('id', 'ASC')
                            ->take(5)
                            ->paginate(5);
        }else{
            $data = recallmodel::select()->where('status','1')->paginate(40);
        }
        
        return view('frontend.recall-exam',['data'=>$data]);
    }

    // function RecallExam(){

    //     if(mockinformation::where('user_id',Auth::user()->id)->where('type','3')->where('year',date('Y'))->where('month',date('m'))->count() >= 1){
    //         return redirect('q-bank/recall-exam');
    //     }
    //     $data = recallmodel::all();
    //     $data_array[] = "";
    //     foreach($data as $key => $value){
    //         $data_array[$key] = $value->exam_month;
    //     }
    //     if(!in_array(date('m'),$data_array)){
    //         return redirect('q-bank/recall-exam');
    //     }
    //     $continue_data = mockinformation::select()->where('user_id',Auth::user()->id)->where('status','1')->get();
    //     $exists_data = mockinformation::where('user_id',Auth::user()->id)->where('status','1')->where('type',"3")->count();
    //     if ($exists_data != '0') {
    //         foreach ($continue_data as $key => $value) {
    //             return redirect('q-bank/recall-exam/'.$value->id);
    //         }
    //     }

    //     if( recallmodel::where('exam_month',date('m'))->where('status',1)->count() == '1'){
    //         $fetch_question = question::select()->where('status',recallmodel::where('exam_month',date('m'))->where('status',1)->get()[0]->id)->get()->random(180) ;
    //     }else{
    //         return redirect('/');
    //     }

    //     $exam_id = time();
    //     $user_id = Auth::user()->id;
    //     foreach($fetch_question as $value){
    //         mockquestion::insert([
    //             'exam_id' => $exam_id,
    //             'user_id' => $user_id,
    //             'ques_id' => $value->id,
    //             'question' => $value->question,
    //             'cat_id' => $value->cat_id,
    //             'ans' => $value->ans,
    //             'explanation' => $value->explanation,
    //             'search_id' => $value->search_id,
    //             'hint' => $value->hint,
    //             'type' => $value->type,
    //         ]);
    //     }
    //     $id = mockinformation::insertGetId([
    //         'user_id' =>$user_id,
    //         'exam_id' =>$exam_id,
    //         'time' =>180*60,
    //         'wrong_ans' =>0,
    //         'right_ans' =>0,
    //         'type' =>3,
    //         'year' =>date('Y'),
    //         'month' =>date('m'),
    //         'recall_id' =>recallmodel::where('exam_month',date('m'))->where('status',1)->get()[0]->id,
    //     ]);

    //     return redirect('q-bank/recall-exam/'.$id);
    // }

    // function ReExam($id){

    //     if(mockinformation::where('id',$id)->where('type','3')->count() >= 3){
    //         return redirect('q-bank/recall-exam');
    //     }
    //     if (mockinformation::findOrFail($id)->time == '0') {
    //         return redirect('q-bank/recall-exam/result/'.$id);
    //     }

    //     $exam_id = mockinformation::findOrFail($id)->exam_id;
    //     $data = mockquestion::select()->where('exam_id',$exam_id)->simplePaginate(1);
    //     $mark = mockquestion::select()->where('exam_id',$exam_id)->get();
    //     $total_question = mockquestion::where('exam_id',$exam_id)->count();
    //     $lab = ui_team_work::findOrFail(10)->content;
    //     //time
    //     $fetch_time = mockinformation::select()->where('id',$id)->get()[0]->time;
    //     $array_time = explode(':',$fetch_time);
    //     if(isset($array_time[1])){
    //             $count_down = ($array_time[0]*60*60)+($array_time[1]*60) +($array_time[2]);
    //     }else{
    //         $count_down = $fetch_time;
    //     }
    //     $url = "recall-exam";

    //     return view('frontend.mock-exam',['data'=>$data,'total_question'=>$total_question,'id'=>$id])->with(['count_down'=>$count_down,'url'=>$url,'mark'=>$mark,'lab'=>$lab]);
    // }

}
