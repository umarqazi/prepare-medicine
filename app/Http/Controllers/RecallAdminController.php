<?php

namespace App\Http\Controllers;


use App\recallmodel;
use App\answer;
use App\categoty;
use App\Imports\QuestionImport;
use App\question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RecallAdminController extends Controller
{
    function SingleIndex($id){

        $data = question::select()->where('status',$id)->where('type','0')->paginate(30);
        return view('backend.recall-question',['data'=>$data,'id'=>$id]);
    }

    function AddSingle($id){

        return view('backend.add-recall-question',['id'=>$id]);
    }

    function Single(Request $request){

        $request->validate([
            'status' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'ans' => 'required',
        ]);
        // if(question::where('status',$request->status)->count() >= 5){
        //     return back()->with('error','Maximum questions uploaded !!');
        // }
        foreach ($request->ans as $key => $value) {
            if ($value == null || empty($value)) {
                return back()->withErrors('Fillup all answer fields !!');
            }
        }
        if($request->explanation == null || empty($request->explanation) ){
            $que_id = question::insertGetId([
                'question' => $request->question,
                'cat_id' => 0,
                'ans' => $request->answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
                'search_id' => 0,
                'status' => $request->status,
            ]);
            foreach ($request->ans as $key => $value) {
                answer::insert([
                    'ans' => $value,
                    'answer' => $key,
                    'ques_id' => $que_id,
                ]);
            }
        }else{
            $que_id = question::insertGetId([
                'question' => $request->question,
                'cat_id' => 0,
                'ans' => $request->answer,
                'hint' => $request->hint,
                'explanation' => $request->explanation,
                'search_id' => 0,
                'status' => $request->status,
            ]);
            foreach ($request->ans as $key => $value) {
                answer::insert([
                    'ans' => $value,
                    'answer' => $key,
                    'ques_id' => $que_id,
                ]);
            }
        }
        return back()->withSuccess('Question successfully added !!');
    }

    function EditSingle(Request $request){

        $request->validate([
            'status' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'ans' => 'required',
            'id' => 'required',
        ]);
        foreach ($request->ans as $key => $value) {
            if ($value == null || empty($value)) {
                return back()->withErrors('Fillup all answer fields !!');
            }
        }
        
        if($request->explanation == null || empty($request->explanation) ){
            question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => 0,
                'ans' => $request->answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
            ]);
            foreach (question::findOrFail($request->id)->question_ans as $keys => $item) {
                $ans_id = $item->id;
                foreach ($request->ans as $key => $value) {
                    if ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys){
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }
                }
            }
        }else{
            question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => 0,
                'ans' => $request->answer,
                'hint' => $request->hint,
                'explanation' => $request->explanation,
            ]);
            foreach (question::findOrFail($request->id)->question_ans as $keys => $item) {
                $ans_id = $item->id;
                foreach ($request->ans as $key => $value) {
                    if ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys){
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }
                }
            }
        }
        return back()->withSuccess('Question successfully updated !!');
    }


    // Multiple question's function


    function MultiIndex($id){

        $data = question::select()->where('status',$id)->where('type','1')->paginate(30);
        return view('backend.recall-multi-question',['data'=>$data,'id'=>$id]);
    }

    function AddMulti($id){
        return view('backend.add-recall-multi-question',['id'=>$id]);
    }

    function Multi(Request $request){

        $request->validate([
            'status' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'ans' => 'required',
        ]);
        // if(question::where('status',$request->status)->count() >= 5){
        //     return back()->with('error','Maximum questions uploaded !!');
        // }

        if(empty($request->answer)){
            return back()->withErrors('You have to check one or more answer !!');
        }
        $answer = null;
        foreach ($request->answer as $key => $value) {
            $answer .= $value.'-';
        }

        foreach ($request->ans as $key => $value) {
            if ($value == null || empty($value)) {
                return back()->withErrors('Fillup all answer fields !!');
            }
        }
        
        if($request->explanation == null || empty($request->explanation) ){
            $que_id = question::insertGetId([
                'question' => $request->question,
                'cat_id' => 0,
                'ans' => $answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
                'search_id' => 0,
                'type' => '1',
                'status' => $request->status,
            ]);
            foreach ($request->ans as $key => $value) {
                answer::insert([
                    'ans' => $value,
                    'answer' => $key,
                    'ques_id' => $que_id,
                ]);
            }
        }else{
            $que_id = question::insertGetId([
                'question' => $request->question,
                'cat_id' => 0,
                'ans' => $answer,
                'hint' => $request->hint,
                'explanation' => $request->explanation,
                'search_id' => 0,
                'type' => '1',
                'status' => $request->status,
            ]);
            foreach ($request->ans as $key => $value) {
                answer::insert([
                    'ans' => $value,
                    'answer' => $key,
                    'ques_id' => $que_id,
                ]);
            }
        }
        return back()->withSuccess('Question successfully added !!');
    }

    function EditMulti(Request $request){

        $request->validate([
            'status' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'ans' => 'required',
            'id' => 'required'
        ]);

        if(empty($request->answer)){
            return back()->withErrors('You have to check one or more answer !!');
        }
        $answer = null;
        foreach ($request->answer as $key => $value) {
            $answer .= $value.'-';
        }

        foreach ($request->ans as $key => $value) {
            if ($value == null || empty($value)) {
                return back()->withErrors('Fillup all answer fields !!');
            }
        }

        if($request->explanation == null || empty($request->explanation) ){
            question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => 0,
                'ans' => $answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
            ]);
            foreach (question::findOrFail($request->id)->question_ans as $keys => $item) {
                $ans_id = $item->id;
                foreach ($request->ans as $key => $value) {
                    if ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys){
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }
                }
            }
        }else{
            question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => 0,
                'ans' => $answer,
                'hint' => $request->hint,
                'explanation' => $request->explanation,
            ]);
            foreach (question::findOrFail($request->id)->question_ans as $keys => $item) {
                $ans_id = $item->id;
                foreach ($request->ans as $key => $value) {
                    if ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys){
                        answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }
                }
            }
        }
        return back()->withSuccess('Question successfully updated !!');
    }

    function ImportQuestion(Request $request){

        $request->validate([
            'excel' => "required"
        ]);
        $path = $request->file('excel');
        $rows = Excel::toArray(new QuestionImport, $path);

        foreach($rows as $key => $item){
            foreach($item as $key => $value){

                if ($key == '0'){
                    continue;
                }else{
                    if( $value[1] != null){
                        
                        //change 12345 to abcde
                        $main_ans = strtolower($value[2]);
                        $main_ans = str_replace('a','0',strtolower($main_ans));
                        $main_ans = str_replace('b','1',strtolower($main_ans));
                        $main_ans = str_replace('c','2',strtolower($main_ans));
                        $main_ans = str_replace('d','3',strtolower($main_ans));
                        $main_ans = str_replace('e','4',strtolower($main_ans));
                        
                        if( strlen($main_ans) == "1" ){
                            
                            //there have to write my code for single choice question !!
                            $que_id = question::insertGetId([
                                'question' => $value[0],
                                'status' => $value[1],
                                'cat_id' => 0,
                                'ans' => $main_ans,
                                'explanation' => $value[3],
                                'hint' => $value[4],
                                'search_id' => 0,
                            ]);
                            for($i=5,$y=0;$i<=9;$i++,$y++){
                                answer::insert([
                                    'ans' => $value[$i],
                                    'answer' => $y,
                                    'ques_id' => $que_id,
                                ]);
                            }
                        }else{
                            //there have to write my code for multi choice question!!
                            $que_id = question::insertGetId([
                                'question' => $value[0],
                                'status' => $value[1],
                                'cat_id' => 0,
                                'ans' => $main_ans,
                                'explanation' => $value[3],
                                'hint' => $value[4],
                                'search_id' => 0,
                                'type' => "1",
                            ]);
                            for($i=5,$y=0;$i<=9;$i++,$y++){
                                answer::insert([
                                    'ans' => $value[$i],
                                    'answer' => $y,
                                    'ques_id' => $que_id,
                                ]);
                            }
                        }
                        
                    }else{
                        return back();
                    }
                }
            }
            return back();
        }

    }

    function Status($id,$opt){
        if ($opt == "on") {
            recallmodel::findOrFail($id)->update(['status'=>'1']);
        } elseif ($opt == "off") {
            recallmodel::findOrFail($id)->update(['status'=>'0']);
        }
        return back();
    }
}
