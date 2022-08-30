<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSale extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_sales', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('item_id',false,true)->length(11);
            $table->foreign('item_id')->references('id')->on('tbl_items');
			$table->integer('department_id',false,true)->length(11);
            $table->foreign('department_id')->references('id')->on('tbl_item_departments');
            $table->string('department_name',50);
			$table->integer('quantity_sold',false,true)->length(11);
			$table->integer('quantity_remain',false,true)->length(11);
            $table->integer('sale_amount_total',false,true)->length(11);
			$table->integer('user_id',false,true)->length(11);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('client_id',false,true)->length(11);
            $table->foreign('client_id')->references('id')->on('tbl_clients');
			$table->date('date_sold');
			$table->time('time_sold');
			$table->integer('facility_id',false,true)->length(5);
            $table->foreign('facility_id')->references('id')->on('tbl_facilities');
			$table->integer('sale_profit',false,true)->length(11);
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
        Schema::dropIfExists('tbl_sales');
    }
}
