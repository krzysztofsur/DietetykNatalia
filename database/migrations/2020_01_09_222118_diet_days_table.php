<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DietDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dietid')->unsigned();
            $table->date('day');
            $table->text('table');
            $table->timestamps();
            
            $table->foreign('dietid')->references('id')->on('diets');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_days');
        
    }
}
