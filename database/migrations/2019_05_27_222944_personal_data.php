<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonalData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: create('personal_data', function (Blueprint $table){
            $table->increments('id');
            $table->integer('userid')->unsigned();
            $table->string('firstname', 50);
            $table->string('lastname', 100);
            $table->string('phone', 15)->nullable($value = true);
            $table->enum('sex',['male','female']);
            $table->date('birthdate')->nullable($value = true);
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
        Schema::drope('personal_data');
    }
}