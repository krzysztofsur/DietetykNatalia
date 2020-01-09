<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diets extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'userid','id');
    }
    public function dietDays()
    {
        return $this->hasMany('App\DietDays', 'dietid');
    }
}
