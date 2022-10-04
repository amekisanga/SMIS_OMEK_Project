<?php
namespace App\Http\Controllers\OmekDispController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\classes\patientRegistration;
use App\OmekDispensary\Tbl_item;
use App\OmekDispensary\Tbl_sale;

class ItemmanageController extends Controller
{
	// Get Item to Serve
	 public function getitemtoserve(Request $request)
	 {
		 $search=$request['SearchItem'];
		 $facility_id=$request['facility_id'];
		 return DB::table('tbl_clients')
		 ->where('client_name','like','%'.$search.'%')
		 ->where('client_registration_no','like','%'.$search.'%')
		 ->where('tbl_clients.facility_id',$facility_id)
			->select
		 ('tbl_clients.*',
		 'tbl_client_genders.id','tbl_client_genders.gender_name'
		 )
		->join('tbl_client_genders',"tbl_clients.gender_id","=","tbl_client_genders.id")
		->get();
	 }
	 
	 
	// Get Item Type
	 public function getitemtype(Request $request)
	 {
		 $search=$request['SearchItem'];
		 $facility_id=$request['facility_id'];
		 return DB::table('tbl_clients')
		 ->where('client_name','like','%'.$search.'%')
		 ->where('client_registration_no','like','%'.$search.'%')
		 ->where('tbl_clients.facility_id',$facility_id)
			->select
		 ('tbl_clients.*',
		 'tbl_client_genders.id','tbl_client_genders.gender_name'
		 )
		->join('tbl_client_genders',"tbl_clients.gender_id","=","tbl_client_genders.id")
		->get();
	 }
	 
	 
	 //get Item Types
		public function get_item_types($facility_id)
		{
			return DB::table('tbl_item_types')
				->where('facility_id',$facility_id)
				->get();
			//return Tbl_type_item::get();
		}
		
	 //get Item Categories
		public function get_item_categories($facility_id)
		{
			return DB::table('tbl_item_categories')
				->where('facility_id',$facility_id)
				->get();
			//return Tbl_type_item::get();
		}
		
	 //get Item Departments
		public function get_item_departments($facility_id)
		{
			return DB::table('tbl_item_departments')
				->where('facility_id',$facility_id)
				->get();
			//return Tbl_type_item::get();
		}
		
	 //get Item Units
		public function get_item_units($facility_id)
		{
			return DB::table('tbl_item_units')
				->where('facility_id',$facility_id)
				->get();
			//return Tbl_type_item::get();
		}
	 
	 //get Item Batches
		public function get_item_batches()
		{
			return DB::table('tbl_item_batches')
				//->where('facility_id',$facility_id)
				->get();
			//return Tbl_type_item::get();
		}
	 
	 //get Item Status
		public function get_item_statuses()
		{
			return DB::table('tbl_statuses')
				//->where('facility_id',$facility_id)
				->get();
			//return Tbl_type_item::get();
		}
		
	 //save Item 
		public function saveitem(Request $request)
		{
		$ldate = date('Y-m-d');
		$time = date('H:i:s');
		$datetime = date('Y-m-d H:i:s');
        $item_name=$request['item_name']; 
		$item_type=$request['item_type'];
		$item_category=$request['item_category'];
        $department_id=$request['item_department']; 
		$units=$request['item_unit'];
        $batch=$request['item_batche']; 
		$status=$request['item_status'];
        $buyingprice=$request['item_buyingprice']; 
		$sellingprice=$request['item_sellingprice'];
        $quantitybought=$request['item_quantity']; 
		$reorder=$request['item_reorder'];
        $user_id=$request['user_id']; 
		$facility_id=$request['user_facility_id'];

        if(patientRegistration::duplicate('tbl_items',array(
            'item_name','item_type_id','item_category_id','item_department_id',
			'item_unit_id','item_batche_id','item_status_id','item_buyingprice_new',
			'item_sellingprice_new','item_quantity_bought','item_reorder','facility_id',
            "((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"),
            array($item_name,$item_type,$item_category,$department_id,$units,$batch,$status,$buyingprice,
			$sellingprice,$quantitybought,$reorder,$facility_id))==true){

            return response()->json([
                'msg' => $item_name." ALREADY EXISTS",
                'status' =>0
            ]);
        }
        else{
			
			$data_record=Tbl_item::create(array(
			
                'item_name'=>$item_name,
				'item_type_id'=>$item_type,
				'item_category_id'=>$item_category,
                'item_department_id'=>$department_id,
				'item_unit_id'=>$units,
				'item_batche_id'=>$batch,
				'item_status_id'=>$status,
				
                'item_buyingprice_old'=>0,
                'item_buyingprice_new'=>$buyingprice,
				
                'item_sellingprice_old'=>0,
                'item_sellingprice_new'=>$sellingprice,
				
                'item_quantity_old'=>0,
                'item_quantity_new'=>0,
                'item_quantity_bought'=>$quantitybought,
				
                'item_reorder'=>$reorder,
				
                'facility_id'=>$facility_id,
				
                'user_id'=>$user_id,
				
                'item_date_bought'=>$ldate,
				
                'item_time_bought'=>$time,
				
				'status'=>$status

            ));
			
			    // $data=Tbl_item::create(array(
                // 'item_name'=>$item_name,
                // 'item_type'=>$item_type,
                // 'department_id'=>$department_id,
                // 'buying_price'=>$buyingprice,
                // 'selling_price'=>$sellingprice,
                // 'batch_id'=>$batch,
                // 'quantity'=>$quantity,
                // 'registered_date'=>$ldate,
                // 'updated_datetime'=>$datetime,
                // 'reorder_level'=>$reorder,
                // 'unit_id'=>$units,
                // 'facility_id'=>$facility_id,
                // 'user_id'=>$user_id,
                // 'status'=>$status
				// ));
				
            return response()->json(
                ['msg'=>$item_name ." Successful Registered",
                    'status'=>1
                ]
				)  ;
			}
		}
		
		public function get_item_registered($facility_id)
		{
			return DB::table('tbl_items')
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
				->get();
				
		}
		
		public function getitemtoupdates(Request $request)
	 {
		 $search=$request['SearchedItem'];
		 $facility_id=$request['facility_id'];
		 return DB::table('tbl_items')
		 ->where('item_name','like','%'.$search.'%')
		 ->where('tbl_items.status','=',1)		 
		 ->where('users.facility_id',$facility_id)
			->select
		 ('tbl_items.id as itemid','tbl_items.item_name','tbl_items.item_buyingprice_new',
		 'tbl_items.item_buyingprice_old','tbl_items.item_sellingprice_new',
		 'tbl_items.item_sellingprice_old','tbl_items.item_quantity_bought',
		 'tbl_items.item_quantity_old','tbl_items.item_quantity_new',
		 'users.id','users.facility_id',
		 'tbl_item_types.id','tbl_item_types.item_type',
		 'tbl_item_categories.id','tbl_item_categories.item_category',
		 'tbl_item_units.id','tbl_item_units.item_units',
		 'tbl_item_departments.id','tbl_item_departments.item_department',
		 'tbl_item_batches.id','tbl_item_batches.item_batch',
		 'tbl_facilities.id','tbl_facilities.facility_name'
		 )
		->join('users',"tbl_items.facility_id","=","users.id")
		->join('tbl_item_types',"tbl_items.item_type_id","=","tbl_item_types.id")
		->join('tbl_item_categories',"tbl_items.item_category_id","=","tbl_item_categories.id")
		->join('tbl_item_units',"tbl_items.item_unit_id","=","tbl_item_units.id")
		->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
		->join('tbl_item_batches',"tbl_items.item_batche_id","=","tbl_item_batches.id")
		->join('tbl_facilities',"tbl_items.facility_id","=","tbl_facilities.id")
		->get();
	 }

	 public function getitemtosale(Request $request)
	 {
		 
		 $search=$request['SearchedItem'];
		 $facility_id=$request['facility_id'];
		 return DB::table('tbl_items')
		 ->where('item_name','like','%'.$search.'%')
		 ->where('tbl_items.status','=',1)		 
		 ->where('users.facility_id',$facility_id)
			->select
		 ('tbl_items.*','tbl_items.id as itemtobesoldid',
		 'users.id','users.facility_id',
		 'tbl_item_types.id','tbl_item_types.item_type',
		 'tbl_item_categories.id','tbl_item_categories.item_category',
		 'tbl_item_units.id','tbl_item_units.item_units',
		 'tbl_item_departments.id','tbl_item_departments.item_department',
		 'tbl_item_batches.id','tbl_item_batches.item_batch',
		 'tbl_facilities.id','tbl_facilities.facility_name'
		 )
		->join('users',"tbl_items.facility_id","=","users.id")
		->join('tbl_item_types',"tbl_items.item_type_id","=","tbl_item_types.id")
		->join('tbl_item_categories',"tbl_items.item_category_id","=","tbl_item_categories.id")
		->join('tbl_item_units',"tbl_items.item_unit_id","=","tbl_item_units.id")
		->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
		->join('tbl_item_batches',"tbl_items.item_batche_id","=","tbl_item_batches.id")
		->join('tbl_facilities',"tbl_items.facility_id","=","tbl_facilities.id")
		->get();
	 }

	 
	 //save sales
	public function save_sale_two(Request $request)
	{
		$ldate = date('Y-m-d');
		$time = date('H:i:s');
		//$datetime = new DateTime();
		$user_id=[];
		$user_id=$request->all(); 
		//return $user_id[0]['item_name'];
		//return response()->json(['msg'=>$user_id[2]['item_name'],'status'=>1]);
		//return $abc = $user_id[$i]['department_name'];
		//$sale_profit = $request[0]['sale_amount'];
		//$buying_price01 = $request[0]['buying_price'];
		//$selling_price01 = $request[0]['selling_price'];
		for ($i=0; $i<count($user_id); $i++){
		
		$total_sale_buying[] = $user_id[$i]['sale_amount'] * $user_id[$i]['buying_price'];
		$total_sale_selling[] = $user_id[$i]['sale_amount'] * $user_id[$i]['selling_price'];
		//$sale_profit = $total_sale_selling[] - $total_sale_buying[]; 
		$sale_profit2[$i] = $user_id[$i]['sale_amount'] * $user_id[$i]['selling_price'] - $user_id[$i]['sale_amount'] * $user_id[$i]['buying_price']; 
		//- $user_id[$i]['sale_amount'] * $user_id[$i]['selling_price'];
		
		$updateitem = DB::table('tbl_items')->where('id', '=', $user_id[$i]['item_id'])->update(['item_quantity_bought' => $user_id[$i]['quantity_remain']]);
		
		$data[] = Tbl_sale::create(array(
        'item_id' => $user_id[$i]['item_id'],
		'department_id' => $user_id[$i]['item_department_id'], 
		'department_name' => $user_id[$i]['department_name'], 
		'quantity_sold' => $user_id[$i]['sale_amount'], 
		'quantity_remain' => $user_id[$i]['quantity_remain'],
		'sale_amount_total' => $user_id[$i]['sale_total_amount'], 
        'user_id' => $user_id[$i]['user_id'],
		'client_id' => $user_id[$i]['client_id'],
        'date_sold' => $ldate,
        'time_sold' => $time,
        'facility_id' => $user_id[$i]['facility_id'],
        'sale_profit' => $sale_profit2[$i]
		//'batch_id' => $user_id[$i]['batch_id'],
        //'quantity_sold_amount' => $user_id[$i]['sold_item_price'],
        ));
		
		}
		if (count($data) >= 0){
			return response()->json(
               ['msg'=>$request[$i]['sale_amount']."&nbsp;".$request[$i]['item_name'] ."SALES SUCCESFULLY <br>UMEFANIKIWA KUFANYA MAUZO",'status'=>1]);
		}
		else{
			return response()->json(
                ['msg'=>$request[$i]['item_name'] ."Mauzo Yameshindikana",
                    'status'=>0
                ]);
		}

	}

	//get sold items
	public function getitemsold(Request $request)
	{
		$user_id=$request['user_id']; 
		$facility_id=$request['facility_id'];
		$ldate = date('Y-m-d');
		//return $ldate;
		
		return DB::table('tbl_sales')
		->select
		(
		'tbl_sales.*','tbl_sales.id as sales_id',
		'tbl_items.item_name','tbl_items.item_category_id','tbl_items.item_reorder as reorder_level','tbl_items.item_sellingprice_new as selling_price',
		'tbl_item_categories.id as item_category_id','tbl_item_categories.item_category as item_category_name',
		'tbl_item_units.id as item_unit_id', 'tbl_item_units.item_units as item_unit_name',
		'tbl_item_departments.id as item_department_id','tbl_item_departments.item_department',
		'users.id as user_id','users.name as user_name','tbl_facilities.id as facility_id','tbl_facilities.facility_name as facility_name',
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
		->get();
	}

	public function updatenewitem(Request $request)
	{
		$datetime = date('Y-m-d H:i:s');
		//updatenewitem
		//tbl_itempurchase_records
		//return $item_to_update_id=$request['itemid'];
		//return $query_by_id = Tbl_item::where('id',$request['itemid'])->get();
		$query_by_id = Tbl_item::where('id',$request['itemid'])->get();
		
		if($request['item_new_buying_price'] == ''){
			 $item_buyingprice_new=$query_by_id[0]['item_buyingprice_new'];
			 $item_buyingprice_old=$query_by_id[0]['item_buyingprice_new'];
		}else{
			$item_buyingprice_new=$request['item_new_buying_price'];
			$item_buyingprice_old=$query_by_id[0]['item_buyingprice_new'];
		}

		if($request['item_new_selling_price'] == ''){
			$item_sellingprice_new=$query_by_id[0]['item_sellingprice_new'];
			$item_sellingprice_old=$query_by_id[0]['item_sellingprice_new'];
		}else{
			$item_sellingprice_new=$request['item_new_selling_price'];
			$item_sellingprice_old=$query_by_id[0]['item_sellingprice_new'];
		}
		
		$total_sumed_item = $request['new_item_bought'] + $request['item_quantity_bought'];
		$unit_price_of_bought_item = $request['item_new_buying_price'] / $request['new_item_bought'];

		$update = DB::table('tbl_items') ->where('id', $request['itemid']) 
		->limit(1) 
		->update([ 
		'item_buyingprice_new' => $item_buyingprice_new, 
		'item_buyingprice_old' => $item_buyingprice_old, 
		'item_sellingprice_new' => $item_sellingprice_new,
		'item_sellingprice_old' => $item_sellingprice_old,
		'item_quantity_bought' => $total_sumed_item,
		'item_quantity_old' => $request['item_quantity_old'],
		'item_quantity_new' => $request['item_quantity_new']
		]);

		$data=array('item_id'=>$request['itemid'],
		'item_bought' =>$request['new_item_bought'],
		'item_bought_unit_price' =>$unit_price_of_bought_item,
		'item_bought_total_buying_price'=>$item_buyingprice_new,
		'item_bought_selling_price_new' =>$item_sellingprice_new,
		'item_bought_selling_price_old' =>$item_sellingprice_old,
		'item_bought_unit_price_old' =>$item_buyingprice_old,
		'date' =>$datetime,
		'facility_id' =>$request['facility_id']
		);

        $datas = DB::table('tbl_itempurchase_records')->insert($data);

		if (count($datas) >= 0){
			return response()->json(
               [
			   'msg'=>$query_by_id[0]['item_name']."&nbsp;"."Updated Successfully",
			   'status'=>1
				]);
		}
		else{
			return response()->json(
                [
					'msg'=>$query_by_id[0]['item_name']."&nbsp;"."Fail",
                    'status'=>0
                ]);
		}
		// DB::table('user')
		// ->where('id', $request['itemid'])
		// ->update(array(
		// 	'member_type' => $plan
		// )); 
	} 

	public function getupdateditemrec($facility_id){

		//$facility_id=$request['facility_id'];
		return $facility_id;

	}


	// public function updatenewitem(Request $request)
	// {
	// 	$tbl_item_query = Tbl_item::where('id',$request->id)->get();
	// 	if($tbl_item_query['item_buyingprice_new'] == $request['item_buyingprice_new']){
	// 		$item_buyingprice_new=$request['item_buyingprice_new'];
	// 	}
	// 	else{
	// 		$item_buyingprice_new=$request['item_buyingprice_new'];
	// 		$item_buyingprice_old=$tbl_item_query;
	// 	}
	// 	$item_new_buying_price=$request['item_new_buying_price'];
	// 	$item_new_selling_price=$request['item_new_selling_price'];
	// 	$item_name=$request['item_name']; 
	// 	$item_type_id=$request['item_type_id']; 
	// 	$item_category_id=$request['item_category_id'];
	// 	$item_department_id=$request['item_department_id'];
	// 	$item_unit_id=$request['item_unit_id'];
	// 	$item_batche_id=$request['item_batche_id'];
	// 	$item_status_id=$request['item_status_id'];
	// 	$item_buyingprice_new=$request['item_buyingprice_new'];
	// 	$item_buyingprice_old=$request['item_buyingprice_old'];
	// 	$item_sellingprice_new=$request['item_sellingprice_new'];
	// 	$item_sellingprice_old=$request['item_sellingprice_old'];
	// 	$item_quantity_bought=$request['item_quantity_bought'];
	// 	$newboughtquantity=$request['new_item_bought'];
	// 	$item_quantity_old=$request['item_quantity_old'];
	// 	$item_quantity_new=$request['item_quantity_new'];
	// 	$user_id=$request['user_id']; 
	// 	$facility_id=$request['facility_id'];
	// 	$sumofoldandnewboughtitems =$item_quantity_bought + $newboughtquantity;


	// 	if(patientRegistration::duplicate('tbl_items',array(
    //         'item_name','item_type_id','item_category_id','item_department_id',
	// 		'item_unit_id','item_batche_id','item_status_id','item_buyingprice_new',
	// 		'item_sellingprice_new','item_quantity_bought','item_reorder','facility_id',
    //         "((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"),
    //         array($item_name,$item_type,$item_category,$department_id,$units,$batch,$status,$buyingprice,
	// 		$sellingprice,$quantitybought,$reorder,$facility_id))==true){

    //         return response()->json([
    //             'msg' => $item_name." ALREADY EXISTS",
    //             'status' =>0
    //         ]);
    //     }
    //     else{
	// 			$data_record=Tbl_item::create(array(
			
	// 			'item_name'=>$item_name,
	// 			'item_type_id'=>$item_type_id,
	// 			'item_category_id'=>$item_category_id,
    //             'item_department_id'=>$item_department_id,
	// 			'item_unit_id'=>$item_unit_id,
	// 			'item_batche_id'=>$item_batche_id,
	// 			'item_status_id'=>$item_status_id,
	// 			'user_id'=>$user_id,
	// 			'facility_id'=>$facility_id,
	// 			//insert new item buying price only if is entered othewise replace the one existed 
	// 			// 'item_buyingprice_new'=>$item_buyingprice_new, $item_new_buying_price
	// 			// if ($item_new_buying_price == '') { 
	// 			// 	DB :: insert('insert into book (item_buyingprice_new) values ());
	// 			// }else{
	// 			// 	$tb = DB :: select('select max(tb) from book where ta = ?', array('$ta'));
	// 			// 	if ($tb <= 20) {
	// 			// 		DB :: insert('insert into book (ta, tb) values (ta=?, tb=?)', array('$ta', '$tb' + 1));
	// 			// 	}else{
	// 			// 		DB :: insert('insert into book (ta, tb) values (ta=?, tb=?)', array('$ta' + 1, 1));
	// 			// 	}
	// 			// },
	

	// 	//return $sumofoldandnewboughtitems;
	// 	//return $user_id;

	// 	// if(patientRegistration::duplicate('tbl_items',array(
    //     //     'item_name','item_type_id','item_category_id','item_department_id',
	// 	// 	'item_unit_id','item_batche_id','item_status_id','item_buyingprice_new',
	// 	// 	'item_sellingprice_new','item_quantity_bought','item_reorder','facility_id',
    //     //     "((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"),
    //     //     array($item_name,$item_type,$item_category,$department_id,$units,$batch,$status,$buyingprice,
	// 	// 	$sellingprice,$quantitybought,$reorder,$facility_id))==true){

    //     //     return response()->json([
    //     //         'msg' => $item_name." ALREADY EXISTS",
    //     //         'status' =>0
    //     //     ]);
    //     // }
    //     // else{
			
	// 	// 	$data_record=Tbl_item::create(array(
			
	// 	// 		'item_name'=>$item_name,
	// 	// 		'item_type_id'=>$item_type_id,
	// 	// 		'item_category_id'=>$item_category_id,
    //     //         'item_department_id'=>$item_department_id,
	// 	// 		'item_unit_id'=>$item_unit_id,
	// 	// 		'item_batche_id'=>$item_batche_id,
	// 	// 		'item_status_id'=>$item_status_id,
	// 	// 		'user_id'=>$user_id,
	// 	// 		'facility_id'=>$facility_id,

    //     //         'item_buyingprice_new'=>$item_buyingprice_new, 
	// 	// 		//insert new item buying price only if is entered othewise replace the one existed 

	// 	// 		'item_buyingprice_old'=>$item_buyingprice_old,
	// 	// 		//insert old item buying price (if no new item buying price entered - replace existed)
	// 	// 		//insert existed item buying price as item buying price old (if item buying new is entered)

	// 	// 		'item_sellingprice_new'=>$sellingprice,
    //     //         'item_sellingprice_old'=>0,
                
	// 	// 		'item_quantity_bought'=>$quantitybought,
    //     //         'item_quantity_old'=>0,
    //     //         'item_quantity_new'=>0,

    //     //         'item_reorder'=>$reorder,
    //     //         'item_date_bought'=>$ldate,
    //     //         'item_time_bought'=>$time,
	// 	// 		'status'=>$status, 
	// 	// 		'created_at'=>$create_at,
	// 	// 		'updated_at'=>$datetime 

	// 	// 		$item_buyingprice_new=$request['item_buyingprice_new'];
	// 	// 		$item_buyingprice_old=$request['item_buyingprice_old'];
	// 	// 		$item_sellingprice_new=$request['item_sellingprice_new'];
	// 	// 		$item_sellingprice_old=$request['item_sellingprice_old'];
	// 	// 		$item_quantity_bought=$request['item_quantity_bought'];
	// 	// 		$newboughtquantity=$request['new_item_bought'];
	// 	// 		$item_quantity_old=$request['item_quantity_old'];
	// 	// 		$item_quantity_new=$request['item_quantity_new'];
				
	// 	// 		$sumofoldandnewboughtitems =$item_quantity_bought + $newboughtquantity;

    //     //     ));
				
    //     //     return response()->json(
    //     //         ['msg'=>$item_name ." Successful Registered",
    //     //             'status'=>1
    //     //         ]
	// 	// 		)  ;
	// 	// 	}
	// }


	// }
	
	 
}

