<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product_categories()
    {
        return $this->belongsTo(ProductCategorie::class, 'categories_id')->withTimestamps();
    }
}
