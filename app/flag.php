<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flag extends Model
{
    function flag_question(){
        return $this->hasOne(question::class, 'id', 'ques_id');
    }
}
