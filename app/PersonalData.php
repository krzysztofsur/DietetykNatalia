<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    //
    public function user()
    {
            return $this->belongsTo('App\User', 'userid');
    } 
}
