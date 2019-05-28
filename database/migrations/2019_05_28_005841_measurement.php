<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Measurement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: create('measurements', function (Blueprint $table){
            $table->increments('id');
            $table->double('weight', 8, 2);
            $table->double('height', 8, 2);
            $table->double('waist', 8, 2);
            $table->double('stomach', 8, 2);
            $table->double('hips', 8, 2);
            $table->double('neck', 8, 2);
            $table->double('wrist', 8, 2);
            $table->double('thigh', 8, 2);
            $table->double('biceps', 8, 2);
            $table->double('chest', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drope('measurements');
    }
}
