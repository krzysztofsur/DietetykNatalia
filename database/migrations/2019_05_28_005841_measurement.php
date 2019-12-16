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
            $table->integer('userid')->unsigned();
            $table->double('weight', 8, 2)->nullable($value = true);
            $table->double('height', 8, 2)->nullable($value = true);
            $table->double('waist', 8, 2)->nullable($value = true);
            $table->double('stomach', 8, 2)->nullable($value = true);
            $table->double('hips', 8, 2)->nullable($value = true);
            $table->double('neck', 8, 2)->nullable($value = true);
            $table->double('wrist', 8, 2)->nullable($value = true);
            $table->double('thigh', 8, 2)->nullable($value = true);
            $table->double('biceps', 8, 2)->nullable($value = true);
            $table->double('chest', 8, 2)->nullable($value = true);
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users');
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
