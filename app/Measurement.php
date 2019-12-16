<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    //
    public function user()
    {
            return $this->belongsTo('App\User', 'userid','id');
    } 
}
