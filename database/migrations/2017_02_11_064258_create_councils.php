<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouncils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_councils', function (Blueprint $table) {
            $table->increments('id',3);
			$table->string('council_code',6);
			$table->string('council_name',30);
			$table->Integer('regions_id', false,true)->length(2);
			$table->Integer('council_types_id', false,true)->length(3);
			$table->foreign('regions_id')->references('id')->on('tbl_regions');
			$table->foreign('council_types_id')->references('id')->on('tbl_council_types');
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
        Schema::dropIfExists('tbl_councils');
    }
}
