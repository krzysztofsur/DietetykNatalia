<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_has_meals', 'meal_id', 'product_id')->withPivot('weight','unit')->withTimestamps();
    }
}
