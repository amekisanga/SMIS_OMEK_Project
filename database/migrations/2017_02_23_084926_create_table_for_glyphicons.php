<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForGlyphicons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_glyphicons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon_class',40);
            $table->string('icon_name',60);
			$table->integer('facility_id',false,true)->length(5);
            $table->foreign('facility_id')->references('id')->on('tbl_facilities');
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
        Schema::dropIfExists('tbl_glyphicons');
    }
}
