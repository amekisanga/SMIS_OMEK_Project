<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_residences', function (Blueprint $table) {
            $table->increments('id');
			$table->string('residence_name',60);
			$table->integer('council_id',false,true)->length(3);
			$table->foreign('council_id')->references('id')->on('tbl_councils');
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
        Schema::dropIfExists('tbl_residences');
    }
}
