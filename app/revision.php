<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class revision extends Model
{
    //
    
    public function get_category(){
        return $this->belongsTo('\App\categoty', 'cat_id', 'id');
    }
}
