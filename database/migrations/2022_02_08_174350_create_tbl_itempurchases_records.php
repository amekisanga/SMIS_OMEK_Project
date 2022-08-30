<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblItempurchasesRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_itempurchase_records', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('item_id',false,true)->length(5);
            $table->foreign('item_id')->references('id')->on('tbl_items');
			$table->boolean('item_bought')->nullable();
            $table->integer('item_bought_unit_price')->nullable();
			$table->integer('item_bought_total_buying_price')->nullable();
			$table->integer('item_bought_selling_price_new')->nullable();
			$table->integer('item_bought_selling_price_old')->nullable();
            $table->integer('item_bought_unit_price_old')->nullable();
            $table->date('date')->nullable();
			$table->integer('facility_id',false,true)->length(5);
            $table->foreign('facility_id')->references('id')->on('tbl_facilities');
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
        Schema::dropIfExists('tbl_itempurchase_records');
    }
}
