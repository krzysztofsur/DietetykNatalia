<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergies extends Model
{
    //
    public function user()
    {
            return $this->belongsTo('App\User', 'userid');
    } 
}
