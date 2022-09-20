<?php
namespace App\Http\Controllers\OmekDispController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\OmekDispensary\Tbl_client;

class ItemSalesReport extends Controller
{
	
	// Get Item to Serve
	//  public function postsalereport(Request $request)
	//  {
	// 	 $datefrom=$request['datefrom'];
    //      $dateto=$request['dateto'];
	// 	 $facility_id=$request['facility_id'];
	// 	 return DB::table('tbl_sales')
	// 	 	->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
	// 		->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
	// 	 	->select('tbl_sales.*','tbl_items.id as itemid','tbl_items.item_name',
	// 		'tbl_item_departments.id as itemdepartmentid','tbl_item_departments.item_department')
	// 	    ->where('tbl_sales.date_sold','>=',$datefrom)   
    //         ->where('tbl_sales.date_sold','<=',$dateto)          
	// 		->where('tbl_sales.facility_id',$facility_id)
	// 		//->groupBy('tbl_item_departments.id')
	// 	->get();
	//  }

	// public function postsalereport(Request $request)
	//  {
	// 	 $datefrom=$request['datefrom'];
    //      $dateto=$request['dateto'];
	// 	 $facility_id=$request['facility_id'];
	// 	 $department_id=$request['department_id'];
	// 	 return DB::table('tbl_sales')
	// 	 ->select('tbl_sales.item_id as salesitemid','tbl_sales.quantity_sold','tbl_sales.sale_amount_total','tbl_sales.sale_profit'
	// 	 ,'tbl_sales.user_id as whosold','tbl_items.item_name','tbl_item_departments.id as itemdepartmentid','tbl_item_departments.item_department')
	// 	 ->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
	// 	 ->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
	// 	 ->where('tbl_sales.date_sold','>=',$datefrom)   
    // 	 ->where('tbl_sales.date_sold','<=',$dateto)          
	// 	 ->where('tbl_sales.facility_id',$facility_id)
	// 	 ->where('tbl_sales.department_id',$department_id)
	// 	 //->orderBy ('salesitemid')
	// 	 ->groupBy ('tbl_sales.department_id')
	// 	 //->groupBy ('item_department') 'tbl_items.item_name', 'tbl_sales.id', ,'tbl_sales.sale_profit'
	// 	->get();
	//  }

	public function postsalereport(Request $request)
	 {
		 return DB::table('tbl_sales')
		->select(DB::raw("SUM(tbl_sales.sale_amount_total) AS sale_total"),'tbl_sales.department_name'
		,DB::raw("SUM(tbl_sales.sale_profit) AS sale_profit_total"))
		 ->join('tbl_item_departments',"tbl_sales.department_id","=","tbl_item_departments.id")
		 ->groupBy ('tbl_sales.department_name')
		->get();
	 }

	 //Get detailed sales report
	 public function detailedsalereport(Request $request)
	 {
		 $datefrom=$request['datefrom'];
         $dateto=$request['dateto'];
		 $facility_id=$request['facility_id'];
		 $department_id=$request['department'];
		 
		 return DB::table('tbl_sales')
		 	->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
			->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
			->join('tbl_clients',"tbl_sales.client_id","=","tbl_clients.id")
			->join('users',"tbl_sales.user_id","=","users.id")
		 	->select('tbl_sales.*','tbl_items.id as itemid','tbl_items.item_name',
			'tbl_item_departments.id as itemdepartmentid','tbl_item_departments.item_department',
			'tbl_clients.id as tblclientid','tbl_clients.client_name',
			'users.id as tbluserid','users.name as staff_name')
		    ->where('tbl_sales.date_sold','>=',$datefrom)   
            ->where('tbl_sales.date_sold','<=',$dateto)          
			->where('tbl_sales.facility_id',$facility_id)
		->get();
	 }

	 public function itempurchasereport(Request $request){
		 //return 1;
		 $datefrom=$request['datefrom'];
         $dateto=$request['dateto'];
		 $facility_id=$request['facility_id'];

		 return DB::table('tbl_itempurchases_records')
		 ->join('tbl_items',"tbl_itempurchases_records.itemid","=","tbl_items.id")
		 ->select('tbl_itempurchases_records.*','tbl_items.id as tblitemid','tbl_items.item_name')
		 ->get();
	 }

	 public function getsolditemreport(){
		 //return 1;
		return DB::table('tbl_itempurchase_records')
		->select('tbl_itempurchase_records.id as id2','tbl_itempurchase_records.itemid as item_real_id')
		->get();
	}

}
 