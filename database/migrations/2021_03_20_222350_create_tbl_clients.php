<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		 Schema::create('tbl_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('client_registration_no');
            $table->integer('client_age');
            $table->string('client_mobile');

            $table->integer('facility_id',false,true)->length(5)->unsigned();
            $table->foreign('facility_id')->references('id')->on('tbl_facilities');

            $table->integer('gender_id',false,true)->length(4)->unsigned();
            $table->foreign('gender_id')->references('id')->on('tbl_client_genders');

			$table->integer('occupation_id',false,true)->length(4)->unsigned();
            $table->foreign('occupation_id')->references('id')->on('tbl_client_occupations');
            
			$table->integer('residence_id',false,true)->length(4)->unsigned();
            $table->foreign('residence_id')->references('id')->on('tbl_client_residences');
			$table->integer('user_id',false,true)->length(4)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->boolean('status')->nullable();
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
        //
		Schema::dropIfExists('tbl_clients');
    }
}
