<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('tbl_items', function (Blueprint $table) {
			
            $table->increments('id');
			
			$table->string('item_name',50);
			
			$table->integer('item_type_id',false,true)->length(5);
            $table->foreign('item_type_id')->references('id')->on('tbl_item_types');
			
			$table->integer('item_category_id',false,true)->length(5);
            $table->foreign('item_category_id')->references('id')->on('tbl_item_categories');
			
			$table->integer('item_department_id',false,true)->length(5);
            $table->foreign('item_department_id')->references('id')->on('tbl_item_departments');
			
			$table->integer('item_unit_id',false,true)->length(5);
            $table->foreign('item_unit_id')->references('id')->on('tbl_item_units');
			
			$table->integer('item_batche_id',false,true)->length(5);
            $table->foreign('item_batche_id')->references('id')->on('tbl_item_batches');
			
			$table->integer('item_status_id',false,true)->length(5);
            $table->foreign('item_status_id')->references('id')->on('tbl_statuses');
			
			$table->integer('user_id',false,true)->length(5);
            $table->foreign('user_id')->references('id')->on('users');
			
			$table->integer('facility_id',false,true)->length(5);
            $table->foreign('facility_id')->references('id')->on('tbl_facilities');
			
			$table->integer('item_buyingprice_new');
			
			$table->integer('item_buyingprice_old')->nullable();
			
			$table->integer('item_sellingprice_new');
			
			$table->integer('item_sellingprice_old')->nullable();
			
			$table->integer('item_quantity_bought');
			
			$table->integer('item_quantity_old')->nullable();
			
			$table->integer('item_quantity_new')->nullable();
			
			$table->integer('item_reorder');
			
			$table->date('item_date_bought');
			
			$table->time('item_time_bought');
			
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
		Schema::dropIfExists('tbl_items');
    }
}
