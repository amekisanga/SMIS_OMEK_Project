<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id',false,true)->length(9)->unsigned();
            $table->foreign('role_id')->references('id')->on('tbl_roles');
            $table->integer('user_id',false,true)->length(11)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('tbl_user_roles');
    }
}
