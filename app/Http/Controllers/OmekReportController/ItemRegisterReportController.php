<?php

namespace App\Http\Controllers\OmekReportController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use PDF;


class ItemRegisterReportController extends Controller
{
    // Item register download excel - new registred items
    // Public function sitemregistereddownloadexcel()
	// {
    //     //return 2;
	// 	$customer_data = DB::table('tbl_sales')->get()->toArray();

	// 	$customer_array[] = array('ID', 'Department');
	// 	foreach($customer_data as $customer)
	// 	{
	// 	 $customer_array[] = array(
	// 	  'ID'  => $customer->id,
	// 	  'Department'   => $customer->department_name
	// 	 );
		
	// 	 //return $customer_data;
	// 	}
	// //return $customer_array;
	// return	Excel::create('Customer Data', function($excel) use ($customer_array){
	// 		 $excel->setTitle('Customer Data');
	// 		 $excel->sheet('Customer Data', function($sheet) use ($customer_array){
	// 		  $sheet->fromArray($customer_array, null, 'A1', false, false);
	// 		 });
	// 		})->download('data.xlsx', \Maatwebsite\Excel\Excel::XLSX);

	// }

	public function itemregistereddownloadexcel($type)  
    {  
		//$type=$request['xls'];
		$facility_id = 1;
		$data = DB::table('tbl_items')
				->where('tbl_items.facility_id',$facility_id)
				->where('item_quantity_old','=',0)
				->where('item_quantity_new','=',0)
				->where('item_quantity_bought','!=',0)
				->where('item_buyingprice_old','=',0)
				->where('item_sellingprice_old','=',0)
				->select('tbl_items.*','tbl_item_categories.id','tbl_item_categories.item_category',
						'tbl_item_units.id','tbl_item_units.item_units','tbl_item_departments.id',
						'tbl_item_departments.item_department','tbl_facilities.id','tbl_facilities.facility_name',
						'tbl_item_batches.id','tbl_item_batches.item_batch','tbl_item_types.id','tbl_item_types.item_type',
						'tbl_statuses.id','tbl_statuses.status_name')
				->join('tbl_item_categories',"tbl_items.item_category_id","=","tbl_item_categories.id")
				->join('tbl_item_units',"tbl_items.item_unit_id","=","tbl_item_units.id")
				->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
				->join('tbl_facilities',"tbl_items.facility_id","=","tbl_facilities.id")
				->join('tbl_item_batches',"tbl_items.item_batche_id","=","tbl_item_batches.id")
				->join('tbl_item_types',"tbl_items.item_type_id","=","tbl_item_types.id")
				->join('tbl_statuses',"tbl_items.item_status_id","=","tbl_statuses.id")
				->get()->toArray();
		//return $data; 
		foreach($data as $customer)
		{
		 $customer_array[] = array(
		  'ID'  => $customer->id,
		  'ItemName'   => $customer->item_name,
		  'ItemCategory'   => $customer->item_category,
		  'ItemUnit'   => $customer->item_units,
		  'Quantity'   => $customer->item_quantity_bought,
		  'ItemBuyingpriceNew'   => $customer->item_buyingprice_new,
		  'ItemSellingpriceNew'   => $customer->item_sellingprice_new,
		  'ItemReorderLevel'   => $customer->item_reorder,
		  'ItemDateBought'   => $customer->item_date_bought,
		  'ItemTimeBought'   => $customer->item_time_bought,
		  'ItemDepartment'   => $customer->item_department,
		  'item_batch'   => $customer->item_batch,
		  'ItemType'   => $customer->item_type,
		  'StatusName'   => $customer->status_name,
		  'FacilityName'   => $customer->facility_name
		 );
		}
		//return $customer_array;
        return Excel::create('Item_Registered_Report', function($excel) use ($customer_array) {  
            $excel->setTitle('Customer_Data');
            $excel->sheet('mySheet', function($sheet) use ($customer_array) 
            //$sheet->fromArray($customer_array, null, 'A1', false, false); 
            {  
            $sheet->fromArray($customer_array);  
            });  
        })->download($type); 
	}

	//download today sales report
	public function todaysalesreportdownloadexcel(Request $request)  
    {  
        //
		$user_id= 1; 
		$facility_id = 1;
		$ldate = date('Y-m-d');
		return $type=$request['xls'];

		$data = DB::table('tbl_sales')
		->select
		(
		'tbl_sales.*','tbl_sales.id as sales_id',
		'tbl_items.item_name','tbl_items.item_category_id','tbl_items.item_reorder as reorder_level',
		'tbl_items.item_sellingprice_new as selling_price','tbl_items.item_buyingprice_new as buying_price',
		'tbl_item_categories.id as item_category_id','tbl_item_categories.item_category as item_category_name',
		'tbl_item_units.id as item_unit_id', 'tbl_item_units.item_units as item_unit_name',
		'tbl_item_departments.id as item_department_id','tbl_item_departments.item_department',
		'users.id as user_id','users.name as user_name','tbl_facilities.id as facility_id',
		'tbl_facilities.facility_name as facility_name',
		'tbl_clients.id as client_id','tbl_clients.client_name'
		)
		->where('tbl_sales.user_id',$user_id)
		->where('tbl_sales.facility_id',$facility_id)
		->where('tbl_sales.date_sold',$ldate)
		->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
		->join('tbl_item_categories',"tbl_items.item_category_id","=","tbl_item_categories.id")
		->join('tbl_item_units',"tbl_items.item_unit_id","=","tbl_item_units.id")
		->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
		->join('users',"tbl_sales.user_id","=","users.id")
		->join('tbl_facilities',"tbl_sales.facility_id","=","tbl_facilities.id")
		->join('tbl_clients',"tbl_sales.client_id","=","tbl_clients.id")
		->get()->toArray();
		//return $data; 
		foreach($data as $customer)
		{
		 $customer_array[] = array(
		  'ID'  => $customer->sales_id,
		  'ItemName'   => $customer->item_name,
		  'ItemCategory'   => $customer->item_category_name, //
		  'ItemUnit'   => $customer->item_unit_name, //
		  'ItemDepartment'   => $customer->item_department,//
		  'QuantitySold'   => $customer->quantity_sold,//
		  'ItemUnitBuyingprice'   => $customer->buying_price,//
		  'ItemUnitSellingPrice'   => $customer->selling_price,//
		  'ItemSellingProfit'   => $customer->sale_profit,//
		  'ItemReorderLevel'   => $customer->reorder_level,//
		  //'ItemDateBought'   => $customer->item_date_bought,
		  //'ItemTimeBought'   => $customer->item_time_bought,
		  'UserName'   => $customer->user_name,//
		  //'ItemType'   => $customer->item_type,
		  //'StatusName'   => $customer->status_name,
		  'FacilityName'   => $customer->facility_name//
		 );
		}
		//return $customer_array;
        return Excel::create('Item_Today_Sales_Report', function($excel) use ($customer_array) {  
            $excel->setTitle('Customer_Data');
            $excel->sheet('mySheet', function($sheet) use ($customer_array) 
            //$sheet->fromArray($customer_array, null, 'A1', false, false); 
            {  
            $sheet->fromArray($customer_array);  
            });  
        })->download($type); 
	}

}
