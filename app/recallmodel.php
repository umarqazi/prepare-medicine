<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recallmodel extends Model
{
    protected $fillable = ['name','month','status'];

    function recallmodel_ques(){
        return $this->hasMany(question::class,'status','id');
    }
}
