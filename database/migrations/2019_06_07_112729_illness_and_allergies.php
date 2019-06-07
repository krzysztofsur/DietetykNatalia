<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IllnessAndAllergies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illness_and_allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('illnessid');
            $table->string('allergiesid');
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
        Schema::drope('illness_and_allergies');
    }
}
