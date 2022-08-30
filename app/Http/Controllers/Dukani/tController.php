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
// use App\Transactions\Tbl_transaction_company;
// use App\Transactions\Tbl_transaction_record;
// use App\Transactions\Tbl_transaction_touse;
// use DB;

// class tController extends Controller
// {
    // //get Item Types
    // public function get_tcompanie()
    // {
        // return Tbl_transaction_company::get();
    // }
	
	// //Save Items
    // public function save_company_initial_balance(Request $request)
    // {
		// $tdate = date('Y-m-d');
		// $ttime = date('H:i:s');
        // $company_amount=$request['company_amount']; $company_id=$request['company_id'];
        // $user_id=$request['user_id']; $facility_id=$request['facility_id'];
		
        // if(patientRegistration::duplicate('tbl_transaction_records',array(
                // 'amount','company_id',"((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"),
                // array($company_amount,$company_id))==true){

            // return response()->json([
                // 'msg' => $company_amount." ALREADY EXISTS",
                // 'status' =>0
            // ]);
        // }
        // else{
			
			// $data_record=Tbl_transaction_record::create(array(
                // 'amount'=>$company_amount,
                // 'company_id'=>$company_id,
                // 'facility_id'=>$facility_id,
				// 'status'=>"1",
                // 'user_id'=>$user_id,
				// 'transaction_date'=>$tdate,
				// 'transaction_time'=>$ttime
            // ));
			
			
            // $data=Tbl_transaction_touse::create(array(
                // 'amount'=>$company_amount,
                // 'company_id'=>$company_id,
				// 'remain_amount'=>"0",
                // 'facility_id'=>$facility_id,
				// 'status'=>"1",
                // 'user_id'=>$user_id, 
                // 'transaction_date'=>$tdate,
				// 'transaction_time'=>$ttime

            // ));
            // return response()->json(
                // ['msg'=>$company_amount ." Successful Registered",
                    // 'status'=>1
                // ]
            // )  ;
        // }
    // }
	
	// public function getbalancetransaction()
    // {
		// $ldate = date('Y-m-d');
		// return DB::table('tbl_transaction_records')
		// ->select
		// (
		// 'tbl_transaction_records.*',
		// 'tbl_transaction_records.status as record_status'
		// ,'users.name'
		// ,'tbl_facilities.facility_name'
		// ,'tbl_transaction_companies.company_name'
		// ,'tbl_statuses.status_name','tbl_statuses.id'
		// )
		// ->where('tbl_transaction_records.transaction_date',$ldate)
		// ->join('tbl_transaction_companies',"tbl_transaction_records.company_id","=","tbl_transaction_companies.id")
		// ->join('tbl_statuses',"tbl_transaction_records.status","=","tbl_statuses.status")
		// ->join('users',"tbl_transaction_records.user_id","=","users.id")
		// ->join('tbl_facilities',"tbl_transaction_records.facility_id","=","tbl_facilities.id")
		// ->get();
    // }
	
	// public function getbalancetransactiontouse()
    // {
		// $ldate = date('Y-m-d');
		// return DB::table('tbl_transaction_touses')
		// ->select
		// (
		// 'tbl_transaction_touses.*',
		// 'tbl_transaction_touses.status as tousesrecord_status',
		// 'tbl_transaction_companies.company_name'
		// )
		// ->where('tbl_transaction_touses.transaction_date',$ldate)
		// ->where('tbl_transaction_touses.status','=',1)
		// ->join('tbl_transaction_companies',"tbl_transaction_touses.company_id","=","tbl_transaction_companies.id")
		// ->get();
	// }
	
	// public function get_floatbalance(Request $request)
	// {
		// $company_id=$request['company_id']; $user_id=$request['user_id']; $facility_id=$request['facility_id'];
		// //return $company_id;
		// return DB::table('tbl_transaction_touses')
		// ->select('tbl_transaction_touses.*')
        // ->where('company_id',$company_id)
        // ->where('user_id',$user_id)
        // ->where('facility_id',$facility_id)
        // ->get();
	// }

	// public function tran_transaction_save(Request $request)
	// {
		// $company_id = $request['company_id'];
		// $user_id = $request['user_id'];
		// $facility_id = $request['facility_id'];
		// $floatbalance = $request['floatbalance'];
		// $ogfloat = $request['ogfloat'];
		// $kutoafloat = $request['kutoafloat'];
		// $ldate = date('Y-m-d');
		// $time = date('H:i:s');
		// return $datass;
	// }
	
// }
