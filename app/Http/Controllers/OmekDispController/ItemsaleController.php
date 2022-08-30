<?php
namespace App\Http\Controllers\OmekDispController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ItemsaleController extends Controller
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

	 
}
