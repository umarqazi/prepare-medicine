<?php

namespace App\Http\Controllers;

use App\answer;
use App\categoty;
use App\Imports\QuestionImport;
use App\question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    function SingleIndex(){

        $category = categoty::select()->get();
        $data = question::select()->where('type','0')->where('status','0')->paginate(30);
        return view('backend.question',['data'=>$data,'category'=>$category]);
    }

    function AddSingle(){

        $category = categoty::select()->get();
        return view('backend.add-question',['category'=>$category]);
    }

    function Single(Request $request){

        $request->validate([
            'category' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'ans' => 'required',
        ]);
        foreach ($request->ans as $key => $value) {
            if ($value == null || empty($value)) {
                return back()->withErrors('Fillup all answer fields !!');
            }
        }
        
        if($request->explanation == null || empty($request->explanation) ){
            $que_id = question::insertGetId([
                'question' => $request->question,
                'cat_id' => $request->category,
                'ans' => $request->answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
                'search_id' => substr(categoty::findOrFail($request->category)->name,0,3).time(),
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
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $request->answer,
                'hint' => $request->hint,
                'explanation' => $request->explanation,
                'search_id' => substr(categoty::findOrFail($request->category)->name,0,3).time(),
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
            'category' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'ans' => 'required',
            'id' => 'required',
            'search_id' => 'required',
        ]);
        foreach ($request->ans as $key => $value) {
            if ($value == null || empty($value)) {
                return back()->withErrors('Fillup all answer fields !!');
            }
        }
        if($request->explanation == null || empty($request->explanation) ){
            question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => $request->category,
                'ans' => $request->answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
                'search_id' => $request->search_id,
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
                'cat_id' => $request->category,
                'ans' => $request->answer,
                'hint' => $request->hint,
                'explanation' => $request->explanation,
                'search_id' => $request->search_id,
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


    function MultiIndex(){

        $category = categoty::select()->get();
        $data = question::select()->where('type','1')->where('status','0')->paginate(30);
        return view('backend.multi-question',['data'=>$data,'category'=>$category]);
    }

    function AddMulti(){

        $category = categoty::select()->get();
        return view('backend.add-multi-question',['category'=>$category]);
    }

    function Multi(Request $request){

        $request->validate([
            'category' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'ans' => 'required',
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
        // $subcat_id = subcategory::findOrFail($request->category)->subcat_cat->id;
        if($request->explanation == null || empty($request->explanation) ){
            $que_id = question::insertGetId([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
                'search_id' => substr(categoty::findOrFail($request->category)->name,0,3).time(),
                'type' => '1',
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
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $answer,
                'hint' => $request->hint,
                'explanation' => $request->explanation,
                'search_id' => substr(categoty::findOrFail($request->category)->name,0,3).time(),
                'type' => '1',
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
            'category' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'ans' => 'required',
            'id' => 'required',
            'search_id' => 'required',
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
                'cat_id' => $request->category,
                'ans' => $answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
                'search_id' => $request->search_id,
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
                'cat_id' => $request->category,
                'ans' => $answer,
                'hint' => $request->hint,
                'explanation' => $request->explanation,
                'search_id' => $request->search_id,
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

    function DropQuestion($id){

        question::where('id',$id)->delete();
        answer::where('ques_id',$id)->delete();
        return back();
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
                                'cat_id' => $value[1],
                                'ans' => $main_ans,
                                'explanation' => $value[3],
                                'hint' => $value[4],
                                'search_id' => substr(categoty::findOrFail($value[1])->name,0,3).(time()*rand(1,999)),
                            ]);
                            for($i=5,$y=0;$i<=9;$i++,$y++){
                                answer::insert([
                                    'ans' => $value[$i],
                                    'answer' => $y,
                                    'ques_id' => $que_id,
                                ]);
                            }
                        }else{
                            //there have to write my code multi choice question !!
                            $que_id = question::insertGetId([
                                'question' => $value[0],
                                'cat_id' => $value[1],
                                'ans' => $main_ans,
                                'explanation' => $value[3],
                                'hint' => $value[4],
                                'search_id' => substr(categoty::findOrFail($value[1])->name,0,3).(time()*rand(1,999)),
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
    function select(Request $request){
        if(empty($request->select)){
            return back();    
        }
        question::whereIn('id',$request->select)->delete();
        answer::whereIn('ques_id',$request->select)->delete();
        return back();
    }
    
    function FilterSingle(Request $request){

        if(empty($request->sear_key)){
            return back();    
        }
        
        if ($request->sear_id == 'cat') {

            if(empty( categoty::where('name', 'LIKE', "%{$request->sear_key}%")->get()->toArray() )){
                return back()->with('error',"No result Found");
            }
            $cat_id[] = null;
            foreach (categoty::select()->where('name', 'LIKE', "%{$request->sear_key}%")->get() as $key => $value) {
                $cat_id[$key] = $value->id;
            }
            $data = question::select()->whereIn('cat_id',$cat_id)->where('type','0')->where('status','0')->paginate(30);

        } elseif($request->sear_id == 'sear') {
            $data = question::select()->where('search_id', 'LIKE',"%{$request->sear_key}%")->where('type','0')->where('status','0')->paginate(30);
        } elseif($request->sear_id == 'key') {
            $data = question::select()->where('type','0')->where('status','0')->where('question','LIKE',"%{$request->sear_key}%")->paginate(30);
        }

        $data->appends(request()->query());
        $category = categoty::select()->get();
        return view('backend.question',['data'=>$data,'category'=>$category]);
    }

    function FilterMulti(Request $request){

        if(empty($request->sear_key)){
            return back();    
        }
        
        if ($request->sear_id == 'cat') {

            if(empty( categoty::where('name', 'LIKE', "%{$request->sear_key}%")->get()->toArray() )){
                return back()->with('error',"No result Found");
            }
            $cat_id[] = null;
            foreach (categoty::select()->where('name', 'LIKE', "%{$request->sear_key}%")->get() as $key => $value) {
                $cat_id[$key] = $value->id;
            }
            $data = question::select()->whereIn('cat_id',$cat_id)->where('type','1')->where('status','0')->paginate(30);

        } elseif($request->sear_id == 'sear') {
            $data = question::select()->where('search_id', 'LIKE',"%{$request->sear_key}%")->where('type','1')->where('status','0')->paginate(30);
        } elseif($request->sear_id == 'key') {
            $data = question::select()->where('type','1')->where('status','0')->where('question','LIKE',"%{$request->sear_key}%")->paginate(30);
        }

        $data->appends(request()->query());
        $category = categoty::select()->get();
        return view('backend.multi-question',['data'=>$data,'category'=>$category]);
    }

}
