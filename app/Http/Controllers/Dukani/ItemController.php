// <?php

// namespace App\Http\Controllers\Dukani;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\classes\patientRegistration;
// use App\dukani\Tbl_type_item;
// use App\dukani\Tbl_department;
// use App\dukani\Tbl_item_unit;
// use App\dukani\Tbl_item;
// use App\dukani\Tbl_item_record;
// use App\dukani\Tbl_batch;
// use App\dukani\Tbl_status;
// use App\dukani\Tbl_sale;
// use DB;

// class ItemController extends Controller
// {
    // //
    // //get Item Types
    // public function get_item_type($facility_id)
    // {
		// return DB::table('tbl_type_items')
            // ->where('facility_id',$facility_id)
            // ->get();
        // //return Tbl_type_item::get();
    // }

	// //get Department
    // public function get_department($facility_id)
    // {
		// $facility_id;
		// //$facility_id=$request['facility_id'];
		// return DB::table('tbl_departments')
            // ->where('facility_id',$facility_id)
            // ->get();
        // //return Tbl_department::get();
    // }

    // //get Unit
    // public function get_unit($facility_id)
    // {
		// $facility_id;
        // //return Tbl_item_unit::get();
		// //$facility_id=$request['facility_id'];
		// return DB::table('tbl_item_units')
            // ->where('facility_id',$facility_id)
            // ->get();
    // }

    // //get Batch
    // public function get_batch($facility_id)
    // {
		// return DB::table('tbl_batches')
            // ->where('facility_id',$facility_id)
            // ->get();
        // //return Tbl_batch::get();
    // }
    
    // //get Status
    // public function get_status()
    // {
        // return Tbl_status::get();
    // }

    // //Save Items
    // public function saveitem(Request $request)
    // {
		// $ldate = date('Y-m-d');
		// $time = date('H:i:s');
		// $datetime = date('Y-m-d H:i:s');
        // $item_name=$request['item_name']; $item_type=$request['item_type'];
        // $department_id=$request['department_id']; $units=$request['units'];
        // $batch=$request['batch']; $status=$request['status'];
        // $buyingprice=$request['buyingprice']; $sellingprice=$request['sellingprice'];
        // $quantity=$request['quantity']; $reorder=$request['reorder'];
        // $user_id=$request['user_id']; $facility_id=$request['facility_id'];

        // if(patientRegistration::duplicate('tbl_items',array(
                // 'item_name','item_type','department_id','unit_id','batch_id','status','buying_price','selling_price','quantity','reorder_level',
                // "((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"),
                // array($item_name,$item_type,$department_id,$units,$batch,$status,$buyingprice,$sellingprice,$quantity,$reorder))==true){

            // return response()->json([
                // 'msg' => $item_name." ALREADY EXISTS",
                // 'status' =>0
            // ]);
        // }
        // else{
			
			// $data_record=Tbl_item_record::create(array(
                // 'item_name'=>$item_name,
                // 'item_type'=>$item_type,
                // 'department_id'=>$department_id,
                // 'buying_price_old'=>0,
                // 'buying_price_new'=>$buyingprice,
                // 'selling_price_old'=>0,
                // 'selling_price_new'=>$sellingprice,
                // 'batch_id'=>$batch,
                // 'quantity_old'=>0,
                // 'quantity_new'=>0,
                // 'quantity_bought'=>$quantity,
                // 'reorder_level'=>$reorder,
                // 'unit_id'=>$units,
                // 'facility_id'=>$facility_id,
                // 'user_id'=>$user_id,
                // 'status'=>$status,
                // 'date_bought'=>$ldate,
                // 'time_bought'=>$time

            // ));
			
			
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
            // return response()->json(
                // ['msg'=>$item_name ." Successful Registered",
                    // 'status'=>1
                // ]
            // )  ;
        // }
    // }

	// //Get Item Updated
    // public function getitemregistered(Request $request)
    // {
         // $user_id=$request['user_id']; $facility_id=$request['facility_id'];
        // return DB::table('VW_ITEM_UPDATED')
            // ->where('itemfacility_id',$facility_id)
            // ->where('user_id',$user_id)
            // ->where('quantity_old','=',0)
            // ->where('quantity_new','=',0)
            // ->where('quantity_bought','!=',0)
			// ->where('buying_price_old','=',0)
			// ->where('selling_price_old','=',0)
            // ->get();
    // }
	
	// //Get New Item Registed
    // public function getnewitemregistered(Request $request)
    // {
         // $user_id=$request['user_id']; $facility_id=$request['facility_id'];
        // return DB::table('VW_ITEM_UPDATED')
            // ->where('itemfacility_id',$facility_id)
            // ->where('user_id',$user_id)
            // ->where('quantity_old','!=',0)
            // ->where('quantity_new','!=',0)
            // ->where('quantity_bought','!=',0)
			// ->where('buying_price_old','!=',0)
			// ->where('selling_price_old','!=',0)
            // ->get();
    // }
	
	// //Get Item to Sale
	// public function getitemtosale(Request $request)
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
	
	// //Get Item to Update
	// public function getupdateitemtosale(Request $request)
	
	// {
		// $searchupdate=$request['SearchItemtoupdate'];
		// //return $searchupdate;
		// $user_id=$request['user_id']; 
		// $facility_id=$request['facility_id'];
		// return DB::table('VW_ITEM_REGISTERED')
			// ->where('item_name','like','%'.$searchupdate.'%')
            // ->where('itemfacility_id',$facility_id)
            // //->where('user_id',$user_id)
            // ->get();
	// }
	
	// public function postupdateitem(Request $request)
	// {
		// $ldate = date('Y-m-d');
		// $time = date('H:i:s');
		// $datetime = date('Y-m-d H:i:s');
		// $Item_ID=$request['Item_ID']; 
		// $user_id=$request['user_id']; 
		// $facility_id=$request['facility_id'];
		// $Buying_Price=$request['Buying_Price'];
		// $Selling_Price=$request['Selling_Price'];
		// $Quantity=$request['Quantity'];
		// $Reorder_Levels= $request['Reorder_Level'];
		// $itemrecord = DB::table('tbl_items')->where('id', '=', $request['Item_ID'])->get();
		// //return $itemrecord;
		// //$buying_price_old = $itemrecord[0]->buying_price;
		// //$selling_price_old = $itemrecord[0]->selling_price;
		// //$quantity_old = $itemrecord[0]->quantity;
		// //$item_type = $itemrecord[0]->item_type;
		// //$department_id = $itemrecord[0]->department_id;
		// //$batch_id = $itemrecord[0]->batch_id;
		// $reorder_level = $itemrecord[0]->reorder_level;
		// $item_names = $itemrecord[0]->item_name;
		// $unit_id = $itemrecord[0]->unit_id;
		// $status = $itemrecord[0]->status;
		
		// $quantity1 = $itemrecord[0]->quantity;
		// $sumquantity = $Quantity + $quantity1;
		
		// $itemupdate = DB::table('tbl_items')->where('id', '=', $Item_ID)->update(['quantity' => $sumquantity,'buying_price'=>$Buying_Price,
		// 'selling_price'=>$Selling_Price,'reorder_level'=>$Reorder_Levels,'updated_datetime'=>$datetime]);
		// $itemupdated[] = Tbl_item_record::create(array(
		// 'item_name' => $item_names,
		// 'item_type' => $itemrecord[0]->item_type,
		// 'department_id' =>$itemrecord[0]->department_id,
		// 'buying_price_old' => $itemrecord[0]->buying_price,
		// 'buying_price_new' =>$Buying_Price,
		// 'selling_price_old' => $itemrecord[0]->selling_price,
		// 'selling_price_new' => $Selling_Price,
		// 'batch_id' => $itemrecord[0]->batch_id,
		// 'quantity_old' => $itemrecord[0]->quantity,
		// 'quantity_new' => $sumquantity,
		// 'quantity_bought' => $Quantity,
		// 'reorder_level' =>$Reorder_Levels,
		// 'unit_id' => $Item_ID,
		// 'facility_id' => $facility_id,
		// 'status' => $Item_ID,
		// 'user_id' => $user_id,
		// 'date_bought' => $ldate,
		// 'time_bought' => $time
        // ));
		
		// //return 1;
		// return response()->json(
		// ['msg'=>$item_names ." Successful Updated", 'status'=>1]
		// );
	// }
		
	
	// //save sales
	// public function save_sale(Request $request)
	// {
		// $ldate = date('Y-m-d');
		// $time = date('H:i:s');
		// for ($i=0; $i<count($request); $i++){

		// $updateitem = DB::table('tbl_items')->where('id', '=', $request[$i]['item_id'])->update(['quantity' => $request[$i]['quantity_remain']]);
		// //if (count($updateitem)==1)
		// //{
		// //var saleamount = $request[$i]['sale_amount'] * $request[$i]['sold_item_price'];
		// $data[] = Tbl_sale::create(array(
        // 'item_id' => $request[$i]['item_id'],    
        // 'batch_id' => $request[$i]['batch_id'],
        // 'quantity_sold' => $request[$i]['sale_amount'],
        // 'quantity_sold_amount' => $request[$i]['sold_item_price'],
        // 'user_id' => $request[$i]['user_id'],
        // 'date_sold' => $ldate,
        // 'time_sold' => $time,
        // 'facility_id' => $request[$i]['facility_id'],
        // 'sale_profit' => $request[$i]['sale_profit']
        // //'sale_profit' => saleamount
        // ));
		// //}
		// //else if (count($data)==1)
		// //{
			// if (count($data)==1){
			// return response()->json(
                // ['msg'=>$request[$i]['sale_amount']."&nbsp;".$request[$i]['item_name'] ." SOLD SUCCESFULLY <br>UMEFANIKIWA KUUZA &nbsp;".$request[$i]['item_name']."&nbsp;".$request[$i]['sale_amount']."",
                    // 'status'=>1]);
		// }
		// else{
			// return response()->json(
                // ['msg'=>$request[$i]['item_name'] ." Sales Failed",
                    // 'status'=>0
                // ]);
		// }
		
		// //return $data;
		// //DB::table('tbl_sales') -> insert($data);// <-- this is better, one query.
       // // $data[] = array(
        // //'item_id' => $request->input('item_id')[$i],    
        // //'batch_id' => $request->input('batch_id')[$i],
        // //'quantity_sold' => $request->input('quantity_sold')[$i],
        // //'quantity_sold_amount' => $request->input('quantity_sold_amount')[$i],
        // //'user_id' => $request->input('user_id')[$i],
        // //'date_sold' => $request->input('date_sold')[$i],
        // //'time_sold' => $request->input('time_sold')[$i],
        // //'facility_id' => $request->input('facility_id')[$i]
        // //);
		// //$purchase->fill($data[$i])->save(); <-- remove this
		// }
		// //DB::table('tbl_sales') -> insert($data);// <-- this is better, one query.
	// //$arr = [];
	// //for ($i = 0; $i < count($request); $i++) {
    // //array_push($arr, 
	// //['item_id' => $request[$i], 
	// ///'batch_id' => $request[$i],
	// //'quantity_sold' => $request[$i],
	// //'quantity_sold_amount' => $request[$i],
	// //'user_id' => $request[$i],
	// //'date_sold' => $request[$i],
	// //'time_sold' => $request[$i],
	// //'facility_id' => $request[$i]
	// //]
	// //);
	// //}
	// //Tbl_sale:create($arr);
	
	// //$arr = [];
	// //for ($i = 0; $i < count($request); $i++) {
    // //DB::table('tbl_sales')->insert([ 
	// //['item_id' => '$request[$i]'], 
	// //['batch_id' => '$request[$i]'],
	// //['quantity_sold' => '$request[$i]'],
	// //['quantity_sold_amount' => '$request[$i]'],
	// //['user_id' => '$request[$i]'],
	// //['date_sold' => '$request[$i]'],
	// //['time_sold' => '$request[$i]'],
	// //['facility_id' => '$request[$i]']
	// //]);
	// //}
	// //Tbl_sale:create($arr);
	
	// //DB::table('users')->insert([
	// //['email' => 'taylor@example.com', 'votes' => 0],
	// //['email' => 'dayle@example.com', 'votes' => 0]
	// //]);
	// ///	 $tracks = $request->json()->all();
    // //foreach ($tracks as $track) {
    // //   Tbl_sale::create($track)
	// //} 
	// //$tracks = $request; 
	// //foreach ($tracks as $track){ 
    // //return Tbl_sale::create(array $track);  //casting object to array
	// //}
	// //echo $item_name[]=$request[0];
	// //echo collect();
	// //foreach ($request as $memu) {
    // //echo $memu['item_name'];
	// //}
	// //for ($i = 0; $i < count($request[$i]); $i++)
	// //{
	// //	echo $request[$i]['item_id']; 
	// //	echo $request[$i]['quantity_remain']; 
	// //	echo $request[$i]['sale_amount']; 
	// //	echo $request[$i]['sold_item_price']."<br>";
	// //	}
	// //$tracks = $request->json()->all();
    
    // //foreach ($tracks as $track) {
    // //  Tbl_sale::create($track);
    // //}
	// }
	
	// //get sold items
	// public function getitemsold(Request $request)
	// {
		// $user_id=$request['user_id']; 
		// $facility_id=$request['facility_id'];
		// $ldate = date('Y-m-d');
		// //return $ldate;
		
		// return DB::table('tbl_sales')
		// ->select
		// (
		// 'tbl_sales.*','tbl_sales.id as sales_id','tbl_sales.quantity_sold',
		//'tbl_sales.quantity_sold_amount','tbl_sales.date_sold','tbl_sales.time_sold',
		// 'tbl_items.*','tbl_item_units.*',
		// 'tbl_departments.*','users.*','tbl_facilities.*','tbl_type_items.*'
		// )
		// //->where('date_sold','>=',$datefrom)
		// //->where('date_sold','<=',$dateto)
		// ->where('tbl_sales.user_id',$user_id)
		// ->where('tbl_sales.facility_id',$facility_id)
		// ->where('tbl_sales.date_sold',$ldate)
		// ->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
		// ->join('tbl_item_units',"tbl_items.unit_id","=","tbl_item_units.id")
		// ->join('tbl_type_items',"tbl_items.item_type","=","tbl_type_items.id")
		// ->join('tbl_departments',"tbl_items.department_id","=","tbl_departments.id")
		// ->join('users',"tbl_sales.user_id","=","users.id")
		// ->join('tbl_facilities',"tbl_sales.facility_id","=","tbl_facilities.id")
		// ->get();
	// }
	
	// //save sales
	// public function save_sale_two(Request $request)
	// {
		// $ldate = date('Y-m-d');
		// $time = date('H:i:s');
		// $user_id=[];
		// $user_id=$request->all(); 
		// //return $user_id[0]['item_name'];
		// //return response()->json(['msg'=>$user_id[2]['item_name'],'status'=>1]);
	
		// for ($i=0; $i<count($user_id); $i++){
		
		// $updateitem = DB::table('tbl_items')->where('id', '=', $user_id[$i]['item_id'])->update(['quantity' => $user_id[$i]['quantity_remain']]);
		
		// $data[] = Tbl_sale::create(array(
        // 'item_id' => $user_id[$i]['item_id'],    
        // 'batch_id' => $user_id[$i]['batch_id'],
        // 'quantity_sold' => $user_id[$i]['sale_amount'],
        // 'quantity_sold_amount' => $user_id[$i]['sold_item_price'],
        // 'user_id' => $user_id[$i]['user_id'],
        // 'date_sold' => $ldate,
        // 'time_sold' => $time,
        // 'facility_id' => $user_id[$i]['facility_id'],
        // 'sale_profit' => $user_id[$i]['sale_profit'],
		// 'new_amount_sold' => $user_id[$i]['new_amount_sold'],
		// 'new_amount_profit' => $user_id[$i]['new_amount_profit'],
		// 'new_total_sold_amount' => $user_id[$i]['new_total_sold_amount']
        // //'sale_profit' => saleamount
        // ));
		
		// }
		// if (count($data) >= 0){
			// return response()->json(
                // ['msg'=>$request[$i]['sale_amount']."&nbsp;".$request[$i]['item_name'] ."SALES SUCCESFULLY <br>UMEFANIKIWA KUFANYA MAUZO",'status'=>1]);
		// }
		// else{
			// return response()->json(
                // ['msg'=>$request[$i]['item_name'] ."Mauzo Yameshindikana",
                    // 'status'=>0
                // ]);
		// }
	// }
	
// }
