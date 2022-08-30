<?php

namespace App\Http\Controllers\Mortuary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mortuary\Tbl_mortuary;
use App\Mortuary\Tbl_cabinet;
use App\Mortuary\Tbl_corpse_admission;
use App\Item_setups\Tbl_item;
use App\classes\patientRegistration;
use DB;
class MortuaryManagementController extends Controller
{
	//Search Mortuary Type
	public function getmortuarytyp(Request $request)
	
	{
	$facility_id=$request['facility_id'];
	$search=$request['SearchMortuaryType'];
	return Tbl_item::where('item_name','like','%'.$search.'%')
	->where('dept_id',"=",7)
	->where('facility_id',"=",$facility_id)
	->join('tbl_item_prices',"tbl_items.id","=","tbl_item_prices.item_id")
	->get();
	}
	
	//GET MORTUARY
	public function getMortuary($facility_id)
	{
	return DB::table('tbl_mortuaries')
	->select(
	'tbl_mortuaries.id as mortuary_id','mortuary_name','tbl_mortuaries.facility_id','facility_name',
	'user_id','name','mortuary_class_id','item_name'
	)
	->where('tbl_mortuaries.facility_id',"=",$facility_id)
	->join('tbl_items',"tbl_mortuaries.mortuary_class_id","=","tbl_items.id")
	->join('tbl_facilities',"tbl_mortuaries.facility_id","=","tbl_facilities.id")
	->join('users',"tbl_mortuaries.user_id","=","users.id")
	->get();
	}
	
	//mortuary Registration
    public function savemortuary(Request $request)
    {
        $mortuary_name=$request['mortuary_name'];
        $mortuary_class_id=$request['mortuary_class_id'];
        $facility_id=$request['facility_id'];
        $user_id=$request['user_id'];
		
		if(patientRegistration::duplicate('Tbl_mortuaries',array(
		'mortuary_name','mortuary_class_id','facility_id','user_id',
		"((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"), 
		array($mortuary_name,$mortuary_class_id,$facility_id,$user_id))==true){

		return response()->json([
		'msg' => $mortuary_name.' ALREADY EXISTS',
		'status' => '0'
		]);
		}
        else{
            $data=Tbl_mortuary::create(array(
			'mortuary_name'=>$mortuary_name,
			'mortuary_class_id'=>$mortuary_class_id,
			'facility_id'=>$facility_id,
			'user_id'=>$user_id
			
			));
			 return response()->json(
			['msg'=>$mortuary_name ." Successful Registered",
			'status'=>1
			]
			)  ;
        }
    }
	
	///get mortuary information
	public function getMortuaryInfo(Request $request)
    {
		     $mortuary_id=$request->mortuary_id;
			 $sql="SELECT mortuary_name, id   
			     FROM `tbl_mortuaries` WHERE id='{$mortuary_id}'";			 
			 	 $mortuary=DB::select($sql);           
				if(count($mortuary)==1){	
				 return $mortuary; 	
				}else{				
			return response()->json(
			['msg'=>" No Mortuary Registered",
			'status'=>0
			]
			);  		
				}
	}
	
	
	//Cabinet Registration
    public function createcabinets(Request $request)
    {
        $cabinet_name=$request['cabinet_name'];
        $mortuary_id=$request['mortuary_id'];
        $capacity=$request['capacity'];
        $user_id=$request['user_id'];
		
		if(patientRegistration::duplicate('Tbl_cabinets',array(
		'cabinet_name','mortuary_id','capacity','user_id',
		"((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"), 
		array($cabinet_name,$mortuary_id,$capacity,$user_id))==true){

		return response()->json([
		'msg' => $cabinet_name.' ALREADY EXISTS',
		'status' => '0'
		]);
		}
        else{
            $data=Tbl_cabinet::create(array(
			'cabinet_name'=>$cabinet_name,
			'mortuary_id'=>$mortuary_id,
			'capacity'=>$capacity,
			'user_id'=>$user_id
			
			));
			 return response()->json(
			['msg'=>$cabinet_name ." Successful Registered",
			'status'=>1
			]
			)  ;
        }
    }
	
	
	///get mortuary cabinet information
	public function getCabinetNumber(Request $request)
    {
	$mortuary_id=$request->mortuary_id;
	return DB::table('tbl_cabinets')->select(
	'cabinet_name','id','capacity'
	)
	->where('mortuary_id',"=",$mortuary_id)
	->get();	
	}
	
	//get mortuary cabinet information
	public function getCabinetNumber_inmortuary(Request $request)
	{
	$mortuary_id=$request->mortuary_id;
	$sql="SELECT cabinet_id,cabinet_name,mortuary_id,mortuary_name,
	count(*) AS number_of_cabinet  
	FROM `vw_mortuary_cabinet` WHERE mortuary_id='{$mortuary_id}' 
	GROUP BY mortuary_id";			 
	return $numberofcabinet=DB::select($sql);
	}
	
	
	public function getIPDDispositionList(Request $request)
	{
	$facility_id=$request->facility_id;
	$sql="SELECT * FROM `vw_pending_and_received_disposition` 
	WHERE facility_id='{$facility_id}' AND patient_id !='NULL' 
	AND admission_status_id='1'";
	return DB::select($sql);	
	}

	public function getOPDDispositionList(Request $request)
	{
	$facility_id=$request->facility_id;
	$sql="SELECT * FROM `vw_pending_and_received_disposition` 
	WHERE facility_id='{$facility_id}' AND corpse_id !='null' 
	AND admission_status_id='1'";
	return DB::select($sql);	
	}

	public function getIPDReceivedList(Request $request)
	{
	$facility_id=$request->facility_id;
	$sql="SELECT * FROM `vw_pending_and_received_disposition` 
	WHERE facility_id='{$facility_id}' AND patient_id !='NULL' 
	AND admission_status_id='2' AND mortuary_id !='null'";
	return DB::select($sql);	
	}

	public function getOPDReceivedList(Request $request)
	{
	$facility_id=$request->facility_id;
	$sql="SELECT * FROM `vw_pending_and_received_disposition` 
	WHERE facility_id='{$facility_id}' AND corpse_id !='null' 
	AND admission_status_id='2' AND mortuary_id !='null'";
	return DB::select($sql);	
	}
	
	//GET MORTUARY
	public function getMortuarycabinet(Request $request)
	{
	$mortuary_id=$request->mortuary_id;
	return DB::table('tbl_cabinets')
	->select(
	'tbl_mortuaries.id as mortuary_id','mortuary_name',
	'cabinet_name','capacity','tbl_cabinets.id as cabinet_id'
	)
	->where('tbl_mortuaries.id',"=",$mortuary_id)
	->join('tbl_mortuaries',"tbl_cabinets.mortuary_id","=","tbl_mortuaries.id")
	->get();
	}

	//Admit IPD Corpse admitIPDcorpse
	public function admitIPDcorpse(Request $request)
	{
	$mortuary_id=$request['mortuary_id'];$cabinet_id=$request['cabinet_id'];
	$patient_id=$request['patient_id'];$status=$request['status'];
	$mortuary_name=$request['mortuary_name'];
	$cabinet_name=$request['cabinet_name'];
	$patient_firstname=$request['patient_firstname'];
	$corpse_received_id=$request['corpse_received_id'];
	$corpse_admission_id=$request['corpse_admission_id'];

	if(patientRegistration::duplicate('tbl_corpse_admissions',array(
	'mortuary_id','cabinet_id','patient_id','status','corpse_received_id',
	"((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"), 
	array($mortuary_id,$cabinet_id,$patient_id,$status,$corpse_received_id))==true){

	return response()->json([
	'msg' =>$patient_firstname.' CORPSE STORED ALREADY ON MORTUARY '.$mortuary_name.
	' ON '.$cabinet_name,
	'status' => '0'
	]);
	}
	else{
	$admitIPDcorpsestored=Tbl_corpse_admission::where('id',$corpse_admission_id)
	->update(array('cabinet_id'=>$cabinet_id,'status'=>$status,
	'corpse_received_id'=>$corpse_received_id,
	'mortuary_id'=>$mortuary_id,'admission_status_id'=>2
	)); 
	return response()->json(
	['msg'=>$patient_firstname.' CORPSE SUCCESSFUL STORED ON MORTUARY '.$mortuary_name.
	' ON '.$cabinet_name,
	'status'=>1
	]
	)  ;
	}
	}
	
	//Admit OPD Corpse admitIPDcorpse
	public function admitOPDcorpse(Request $request)
	{
	$mortuary_id=$request['mortuary_id'];$cabinet_id=$request['cabinet_id'];
	$corpse_id=$request['corpse_id'];$status=$request['status'];
	$mortuary_name=$request['mortuary_name'];
	$cabinet_name=$request['cabinet_name'];
	$coups_firstname=$request['coups_firstname'];
	$corpse_received_id=$request['corpse_received_id'];
	$corpse_admission_id=$request['corpse_admission_id'];

	if(patientRegistration::duplicate('tbl_corpse_admissions',array(
	'mortuary_id','cabinet_id','corpse_id','status','corpse_received_id',
	"((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"), 
	array($mortuary_id,$cabinet_id,$corpse_id,$status,$corpse_received_id))==true){

	return response()->json([
	'msg' =>$coups_firstname.' CORPSE STORED ALREADY ON MORTUARY '.$mortuary_name.
	' ON '.$cabinet_name,
	'status' => '0'
	]);
	}
	else{
	$admitIPDcorpsestored=Tbl_corpse_admission::where('id',$corpse_admission_id)
	->update(array('cabinet_id'=>$cabinet_id,'status'=>$status,
	'corpse_received_id'=>$corpse_received_id,
	'mortuary_id'=>$mortuary_id,'admission_status_id'=>2
	)); 
	return response()->json(
	['msg'=>$coups_firstname.' CORPSE SUCCESSFUL STORED ON MORTUARY '.$mortuary_name.
	' ON '.$cabinet_name,
	'status'=>1
	]
	)  ;
	}
	}
}
