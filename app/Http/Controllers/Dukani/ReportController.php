// <?php

// namespace App\Http\Controllers\Dukani;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\dukani\Tbl_sale;
// use App\dukani\Tbl_batch;
// use DB;

// class ReportController extends Controller
// {
    // //
	// //Get Sales Report 
    // public function getsales_reports(Request $request)
    // {
        // $datefrom=$request['datefrom']; 
		// $dateto=$request['dateto'];
        // $user_id=$request['user_id']; 
		// $facility_id=$request['facility_id'];
		// return DB::table('tbl_sales')
		// ->select
		// (
		// 'tbl_sales.*','tbl_sales.id as sales_id','tbl_items.*','tbl_item_units.*','tbl_departments.*','users.*','tbl_facilities.*'
		// )
		// ->where('date_sold','>=',$datefrom)
		// ->where('date_sold','<=',$dateto)
		// //->where('tbl_sales.user_id',$user_id)
		// ->where('tbl_sales.facility_id',$facility_id)
		// ->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
		// ->join('tbl_item_units',"tbl_items.unit_id","=","tbl_item_units.id")
		// ->join('tbl_departments',"tbl_items.department_id","=","tbl_departments.id")
		// ->join('users',"tbl_sales.user_id","=","users.id")
		// ->join('tbl_facilities',"tbl_sales.facility_id","=","tbl_facilities.id")
		// ->get();
    // }
	
	// //Get Item to Sale
	// public function getemployeesales(Request $request)
	// {
		// $search=$request['SearchEmploye'];
		// //$user_id=$request['user_id']; 
		// $facility_id=$request['facility_id'];
		// return DB::table('users')
			// ->where('name','like','%'.$search.'%')
            // ->where('facility_id',$facility_id)
        // //    ->where('user_id',$user_id)
        // //    ->where('status','=',1)
            // ->get();
	// }
	
	// //Get Item to Sale
	// public function get_batches(Request $request)
	// {
		// return Tbl_batch::get();
	// }
	
	
	// //Save Items
    // public function getemployee_sales(Request $request)
    // {
        // $datefrom=$request['datefrom']; 
		// $dateto=$request['dateto'];
        // $user_id=$request['user_id']; 
		// $facility_id=$request['facility_id'];
		// return DB::table('tbl_sales')
// ->select('tbl_sales.*','tbl_sales.id as sales_id','tbl_items.*','tbl_item_units.*','tbl_departments.*','users.*','tbl_facilities.*')
            // ->where('date_sold','>=',$datefrom)
            // ->where('date_sold','<=',$dateto)
            // ->where('tbl_sales.user_id',$user_id)
            // ->where('tbl_sales.facility_id',$facility_id)
			// ->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
			// ->join('tbl_item_units',"tbl_items.unit_id","=","tbl_item_units.id")
			// ->join('tbl_departments',"tbl_items.department_id","=","tbl_departments.id")
			// ->join('users',"tbl_sales.user_id","=","users.id")
			// ->join('tbl_facilities',"tbl_sales.facility_id","=","tbl_facilities.id")
            // ->get();
    // }
	
	// //Get Out of Stock Items
	// public function getoutofstock($facility_id)
	// {
		// $facility_id;
		// return DB::table('tbl_items')
		// ->select('tbl_items.*','tbl_items.id as item_id','tbl_facilities.*','tbl_departments.*','tbl_batches.*','tbl_item_units.*')
              // ->where('tbl_items.facility_id',$facility_id)
              // ->where('quantity',"<=",\DB::raw('reorder_level'))
			  // ->join('tbl_facilities',"tbl_items.facility_id","=","tbl_facilities.id")
			  // ->join('tbl_departments',"tbl_items.department_id","=","tbl_departments.id")
			  // ->join('tbl_batches',"tbl_items.batch_id","=","tbl_batches.id")
			  // ->join('tbl_item_units',"tbl_items.unit_id","=","tbl_item_units.id")
              // //->where('user_id',$user_id)
              // ->where('tbl_items.status','=',1)
              // ->get();
	// }
	
	// //Get getfacilitybatchreport
	// public function getfacilitybatchreport(Request $request)
	// {
		// $item_id_selected=$request['selected_item_id'];
		// $batchno=$request['batch_no'];
		// $fromdate=$request['datefrom']; 
		// $todate=$request['dateto']; 
		// $user_id=$request['user_id'];
		// $facility_id=$request['facility_id'];
		// return DB::table('vw_stock_report')
			// ->where('tbl_items_id','like','%'.$item_id_selected.'%')
            // ->where('tbl_facilities_id',$facility_id)
			// ->where('tb_sales_date_sold','>=',$fromdate)
            // ->where('tb_sales_date_sold','<=',$todate)
            // //->where('user_id',$user_id)
            // ->get();
			// /*return DB::table('tbl_sales')
			// ->select('tbl_items.*','tbl_items.id as item_id','tbl_facilities.*','tbl_departments.*','tbl_batches.*','tbl_item_units.*','users.*')
            // ->where('registered_date','>=',$fromdate)
            // ->where('registered_date','<=',$todate)
            // ->where('batch_id',$batchno)
            // ->where('tbl_items.facility_id',$facility_id)
			// ->where('tbl_items.status','=',1)
			  // ->join('tbl_facilities',"tbl_items.facility_id","=","tbl_facilities.id")
			  // ->join('tbl_departments',"tbl_items.department_id","=","tbl_departments.id")
			  // ->join('tbl_batches',"tbl_items.batch_id","=","tbl_batches.id")
			  // ->join('tbl_item_units',"tbl_items.unit_id","=","tbl_item_units.id")
			  // ->join('users',"tbl_items.user_id","=","users.id")
              // //->where('user_id',$user_id)
            // //->where('user_id',$user_id)
			// //->where('status','=',1)
            // ->get();
			// */
	// }
	
	// public function getitemreport(Request $request)
	// {
		// $search=$request['SearchItem'];
		// $user_id=$request['user_id']; 
		// $facility_id=$request['facility_id'];
		// return DB::table('VW_ITEM_REGISTERED')
			// ->where('item_name','like','%'.$search.'%')
            // ->where('itemfacility_id',$facility_id)
            // //->where('user_id',$user_id)
            // ->get();
	// }
	
	
// }
