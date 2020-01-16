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
        $table->name = 'mleko 1,5%';
        $table->categories_id = 4;
        $table->protein = 3.3;
        $table->carbohydrates= 5;
        $table->fats= 1.5;
        $table->ca= 0;
        $table->k= 0;
        $table->fe= 0;
        $table->na= 0;
        $table->blonnik= 0;
        $table->vitamin_c= 0;
        $table->kwasy_nasycone= 1;
        $table->kwasy_nienasycone=0;
        $table->cholesterol= 0;
        $table->vitamin_b12= 0;
        $table->calories= 47;
        $table->unit= 'g';
        $table->save();
        //$table->product_categories()->attach(4);

        $table = new Product();
        $table->name = 'płatki górskie';
        $table->protein = 11.9;
        $table->categories_id = 1;
        $table->carbohydrates= 69.3;
        $table->fats= 7.2;
        $table->ca= 0;
        $table->k= 0;
        $table->fe= 0;
        $table->na= 0;
        $table->blonnik= 6.9;
        $table->vitamin_c= 0;
        $table->kwasy_nasycone= 1.3;
        $table->kwasy_nienasycone=0;
        $table->cholesterol= 0;
        $table->vitamin_b12= 0;
        $table->calories= 366;
        $table->unit= 'g';
        $table->save();
        

        $table = new Product();
        $table->name = 'Jajko';
        $table->protein = 12.5;
        $table->categories_id = 5;
        $table->carbohydrates= 0.6;
        $table->fats= 9.7;
        $table->ca= 0;
        $table->k= 0;
        $table->fe= 0;
        $table->na= 0;
        $table->blonnik= 0;
        $table->vitamin_c= 0;
        $table->kwasy_nasycone= 1.3;
        $table->kwasy_nienasycone=0;
        $table->cholesterol= 0;
        $table->vitamin_b12= 0;
        $table->calories= 140;
        $table->unit= 'g';
        $table->save();


        $table = new Product();
        $table->name = 'Produkt1';
        $table->protein = 12.5;
        $table->categories_id = 5;
        $table->carbohydrates= 0.6;
        $table->fats= 9.7;
        $table->ca= 0;
        $table->k= 0;
        $table->fe= 0;
        $table->na= 0;
        $table->blonnik= 0;
        $table->vitamin_c= 0;
        $table->kwasy_nasycone= 1.3;
        $table->kwasy_nienasycone=0;
        $table->cholesterol= 0;
        $table->vitamin_b12= 0;
        $table->calories= 140;
        $table->unit= 'g';
        $table->save();

        $table = new Product();
        $table->name = 'Produkt2';
        $table->protein = 12.5;
        $table->categories_id = 5;
        $table->carbohydrates= 0.6;
        $table->fats= 9.7;
        $table->ca= 0;
        $table->k= 0;
        $table->fe= 0;
        $table->na= 0;
        $table->blonnik= 0;
        $table->vitamin_c= 0;
        $table->kwasy_nasycone= 1.3;
        $table->kwasy_nienasycone=0;
        $table->cholesterol= 0;
        $table->vitamin_b12= 0;
        $table->calories= 140;
        $table->unit= 'g';
        $table->save();

    }
}
