<?php

use App\ProductCategorie;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new ProductCategorie();
        $product->name = 'Produkty zbożowe';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Owoce';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Warzywa';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Mleko i produkty mleczne';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Mięso i jaja';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Oleje i tłuszcze';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Cukier i słodycze';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Orzechy i nasiona';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Napoje';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Przyprawy';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Produkty wegetariańskie';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Produkty weganskie';
        $product->save();

        $product = new ProductCategorie();
        $product->name = 'Produkty bezglutenowe';
        $product->save();

    }
}
