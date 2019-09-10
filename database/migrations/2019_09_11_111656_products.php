<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('protein');
            $table->float('carbohydrates');
            $table->float('fats');
            $table->float('ca');
            $table->float('k');
            $table->float('fe');
            $table->float('na');
            $table->float('blonnik');
            $table->float('vitamin_c');
            $table->float('kwasy_nasycone');
            $table->float('kwasy_nienasycone');
            $table->float('cholesterol');
            $table->float('vitamin_b12');
            $table->integer('calories');
            
            $table->integer('categories_id')->unsigned();
            $table->string('unit');
            $table->timestamps();
            $table->foreign('categories_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drope('products');
    }
}
