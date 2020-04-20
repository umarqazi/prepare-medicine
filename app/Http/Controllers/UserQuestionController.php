<?php

namespace App\Http\Controllers;

use App\answer;
use App\categoty;
use App\question;
use App\subcategory;
use App\user_answer;
use App\user_question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuestionController extends Controller
{
    function SingleIndex($id){

        $category = categoty::select()->get();
        $data = user_question::select()->where('type','0')->where('user_id',Auth::user()->id)->paginate(30);
        return view('frontend.question',['data'=>$data,'category'=>$category]);
    }

    function AddSingle(){

        $category = categoty::select()->get();
        return view('frontend.add-question',['category'=>$category]);
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
        // $subcat_id = categoty::findOrFail($request->category)->id;
        if($request->explanation == null || empty($request->explanation) ){
            $que_id = user_question::insertGetId([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $request->answer,
                'explanation' => $request->explanation,
                'user_id' => Auth::user()->id,
                'hint' => $request->hint,
            ]);
            foreach ($request->ans as $key => $value) {
                user_answer::insert([
                    'ans' => $value,
                    'answer' => $key,
                    'ques_id' => $que_id,
                ]);
            }
        }else{
            $que_id = user_question::insertGetId([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $request->answer,
                'user_id' => Auth::user()->id,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
            ]);
            foreach ($request->ans as $key => $value) {
                user_answer::insert([
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
            'id' => 'required'
        ]);
        foreach ($request->ans as $key => $value) {
            if ($value == null || empty($value)) {
                return back()->withErrors('Fillup all answer fields !!');
            }
        }
        // $subcat_id = categoty::findOrFail($request->category)->id;
        if($request->explanation == null || empty($request->explanation) ){
            user_question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $request->answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
            ]);
            foreach (user_question::findOrFail($request->id)->question_ans as $keys => $item) {
                $ans_id = $item->id;
                foreach ($request->ans as $key => $value) {
                    if ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys){
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }
                }
            }
        }else{
            user_question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $request->answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
            ]);
            foreach (user_question::findOrFail($request->id)->question_ans as $keys => $item) {
                $ans_id = $item->id;
                foreach ($request->ans as $key => $value) {
                    if ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys){
                        user_answer::findOrFail($ans_id)->update([
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

        $category = categoty::select()->get();
        $data = user_question::select()->where('type','1')->where('user_id',Auth::user()->id)->paginate(30);
        return view('frontend.multi-question',['data'=>$data,'category'=>$category]);
    }

    function AddMulti(){

        $category = categoty::select()->get();
        return view('frontend.add-multi-question',['category'=>$category]);
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
        // $subcat_id = categoty::findOrFail($request->category)->id;
        if($request->explanation == null || empty($request->explanation) ){
            $que_id = user_question::insertGetId([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $answer,
                'explanation' => $request->explanation,
                'user_id' => Auth::user()->id,
                'type' => '1',
                'hint' => $request->hint,
            ]);
            foreach ($request->ans as $key => $value) {
                user_answer::insert([
                    'ans' => $value,
                    'answer' => $key,
                    'ques_id' => $que_id,
                ]);
            }
        }else{
            $que_id = user_question::insertGetId([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $answer,
                'explanation' => $request->explanation,
                'user_id' => Auth::user()->id,
                'type' => '1',
                'hint' => $request->hint,
            ]);
            foreach ($request->ans as $key => $value) {
                user_answer::insert([
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
        // $subcat_id = categoty::findOrFail($request->category)->id;
        if($request->explanation == null || empty($request->explanation) ){
            user_question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
            ]);
            foreach (user_question::findOrFail($request->id)->question_ans as $keys => $item) {
                $ans_id = $item->id;
                foreach ($request->ans as $key => $value) {
                    if ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys){
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }
                }
            }
        }else{
            user_question::findOrFail($request->id)->update([
                'question' => $request->question,
                'cat_id' => $request->category,
                // 'subcat_id' => $request->category,
                'ans' => $answer,
                'explanation' => $request->explanation,
                'hint' => $request->hint,
            ]);
            foreach (user_question::findOrFail($request->id)->question_ans as $keys => $item) {
                $ans_id = $item->id;
                foreach ($request->ans as $key => $value) {
                    if ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys) {
                        user_answer::findOrFail($ans_id)->update([
                            'ans' => $value,
                            'answer' => $key,
                            'ques_id' => $request->id,
                        ]);
                    }elseif ($key == $keys){
                        user_answer::findOrFail($ans_id)->update([
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

        user_question::where('id',$id)->delete();
        user_answer::where('ques_id',$id)->delete();
        return back();
    }
}
