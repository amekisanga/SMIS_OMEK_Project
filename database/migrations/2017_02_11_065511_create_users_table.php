<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile_number');
            $table->string('gender');
            $table->integer('facility_id',false,true)->length(5)->unsigned();
            $table->foreign('facility_id')->references('id')->on('tbl_facilities');
            $table->integer('proffesionals_id',false,true)->length(3)->unsigned();
            $table->foreign('proffesionals_id')->references('id')->on('tbl_proffesionals');
			$table->boolean('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
