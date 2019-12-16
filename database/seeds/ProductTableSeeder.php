<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new Product();
        $table->name = 'product1';
        $table->categories_id = 1;
        $table->protein = 1;
        $table->carbohydrates= 2;
        $table->fats= 3;
        $table->ca= 4;
        $table->k= 5;
        $table->fe= 5;
        $table->na= 6;
        $table->blonnik= 6;
        $table->vitamin_c= 6;
        $table->kwasy_nasycone= 5;
        $table->kwasy_nienasycone=5 ;
        $table->cholesterol= 4;
        $table->vitamin_b12= 3;
        $table->calories= 12;
        $table->unit= 'test';
        $table->save();
        //$table->product_categories()->attach(2);

        $table = new Product();
        $table->name = 'product3';
        $table->protein = 1;
        $table->categories_id = 3;
        $table->carbohydrates= 2;
        $table->fats= 3;
        $table->ca= 4;
        $table->k= 5;
        $table->fe= 5;
        $table->na= 6;
        $table->blonnik= 6;
        $table->vitamin_c= 6;
        $table->kwasy_nasycone= 5;
        $table->kwasy_nienasycone=5 ;
        $table->cholesterol= 4;
        $table->vitamin_b12= 3;
        $table->calories= 12;
        $table->unit= 'test2';
        $table->save();
        //$table->product_categories()->attach(5);
    }
}
