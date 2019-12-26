<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDiets extends Model
{
    public function user()
    {
            return $this->belongsTo('App\User', 'userid','id');
    } 
}
