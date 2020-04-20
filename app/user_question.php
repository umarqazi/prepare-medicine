<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_question extends Model
{
    protected $fillable = ['question','cat_id','ans','explanation','hint'];

    function question_ans(){
        return $this->hasMany(user_answer::class,'ques_id','id');
    }

    function question_comment(){
        return $this->hasMany(comment::class,'question_id','id');
    }

    // function question_revision(){
    //     return $this->hasOne(user_answer::class,'ques_id','id');
    // }

    function question_flag(){
        return $this->hasMany(flag::class,'ques_id','id');
    }

    function question_revision(){
        return $this->hasOne(user_revision::class,'ques_id','id');
    }
    
    function question_revisions(){
        return $this->hasMany(user_revision::class,'ques_id','id');
    }
    
    
    function get_user_info(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
