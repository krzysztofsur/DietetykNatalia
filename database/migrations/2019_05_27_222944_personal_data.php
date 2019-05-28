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
            $table->integer('userid');
            $table->string('firstname', 50);
            $table->string('lastname', 100);
            $table->string('phone', 15);
            $table->string('email', 100);
            $table->enum('sex',['male','female']);
            $table->date('birthdate');
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
        Schema::drope('personal_data');
    }
}
