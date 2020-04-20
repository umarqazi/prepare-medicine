<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mockquestion extends Model
{
    protected $fillable = ['status','user_ans','search_id'];
    function mocques_ques(){
        return $this->hasOne(question::class,'id','ques_id');
    }

    function mocques_ans(){
        return $this->hasMany(answer::class,'ques_id','ques_id');
    }
}
