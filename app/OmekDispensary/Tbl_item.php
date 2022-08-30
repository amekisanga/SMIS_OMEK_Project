<?php

namespace App\OmekDispensary;

use Illuminate\Database\Eloquent\Model;

class Tbl_item extends Model
{
    //
	protected $fillable=['item_name','item_type_id','item_category_id','item_department_id','item_unit_id',
						'item_batche_id','item_status_id','user_id','facility_id','item_buyingprice_new',
						'item_buyingprice_old','item_sellingprice_new','item_sellingprice_old','item_quantity_bought',
						'item_quantity_old','item_quantity_new','item_reorder','item_date_bought','item_time_bought',
						'status'];
}
