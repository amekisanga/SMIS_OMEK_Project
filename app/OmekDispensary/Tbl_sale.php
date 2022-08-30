<?php

namespace App\OmekDispensary;

use Illuminate\Database\Eloquent\Model;

class Tbl_sale extends Model
{
    //
	protected $fillable=['item_id','quantity_sold','quantity_remain','user_id',
	'client_id','date_sold','time_sold',
	'facility_id','sale_profit','sale_amount_total',
	'department_id','department_name'];
}
