<?php

namespace App\Http\Controllers\OmekReportController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ClientRegistrationController extends Controller
{
    //
    public function cliregistrationnreport(Request $request)
    {
        $datefrom=$request['datefrom'];
        $dateto=$request['dateto'];
		$facility_id=$request['facility_id'];

        return DB::table('tbl_sales')
        ->join('tbl_clients',"tbl_sales.client_id","=","tbl_clients.id")
        ->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
        ->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
        ->select('tbl_sales.date_sold','tbl_sales.time_sold','tbl_clients.client_name','tbl_items.item_name',
        'tbl_item_departments.item_department','tbl_sales.sale_amount_total')
        ->where('tbl_sales.date_sold','>=',$datefrom)   
        ->where('tbl_sales.date_sold','<=',$dateto)          
		->where('tbl_sales.facility_id',$facility_id)
        ->get();    
	// 	 	->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
	// 		->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
	// 	 	->select('tbl_sales.*','tbl_items.id as itemid','tbl_items.item_name',
	// 		'tbl_item_departments.id as itemdepartmentid','tbl_item_departments.item_department')
	// 	    ->where('tbl_sales.date_sold','>=',$datefrom)   
    //         ->where('tbl_sales.date_sold','<=',$dateto)          
	// 		->where('tbl_sales.facility_id',$facility_id)
	// 		//->groupBy('tbl_item_departments.id')
	// 	->get();

    }
}
