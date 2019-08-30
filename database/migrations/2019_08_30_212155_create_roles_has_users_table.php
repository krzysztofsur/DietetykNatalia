<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_has_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        Schema::table('roles_has_users', function (Blueprint $table){
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users');
        });
    
        Schema::table('roles_has_users', function (Blueprint $table){
            $table->integer('roleid')->unsigned();
            $table->foreign('roleid')->references('id')->on('roles');
        });
    }
    


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_has_users');
    }
}
