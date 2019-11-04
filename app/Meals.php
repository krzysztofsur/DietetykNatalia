<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    public function products()
    {
        return $this->belongsToMany(Roles::class, 'products_has_meals', 'meal_id', 'product_id')->withTimestamps();
    }
}
