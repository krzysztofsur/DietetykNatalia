<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Diary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->date('date');
            $table->time('wakeup');
            $table->time('sleeptime');
            $table->text('breakfast1');
            $table->text('breakfast2');
            $table->text('dinner');
            $table->text('tea');
            $table->text('supper');
            $table->text('snacks');
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
        Schema::drope('diary');
    }
}
