<?php

namespace App\Http\Controllers\Facility;

use App\Facility\Tbl_facility;
use App\Facility\Tbl_facility_type;
use App\Facility\Tbl_council;
use App\Facility\Tbl_region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FacilityController extends Controller
{
    //
    //facility_type CRUD
    public function facility_type_registration(Request $request)
    {
        $facility_type=$request['description'];
        $check= Tbl_facility_type::where('description',$facility_type)->first();
        if(count($check)==1)
        {
            return  $facility_type." "."Already Registered";
        }
        else{
            Tbl_facility_type::create($request->all());

            return  "SuccessFul!!!..";
        }
    }

    public function facility_type_list()
    {
        return Tbl_facility_type::get();
    }


    public function facility_type_delete($id)
    {
        return Tbl_facility_type::destroy($id);
    }
	
	//get facility type
    public function facility_types()
    {
        return Tbl_facility_type::get();
    }
	
	//get facility_council
    public function facility_council()
    {
        return Tbl_council::get();
    }
	
	//get facility_region
    public function facility_region()
    {
        return Tbl_region::get();
    }

    public function facility_type_update(Request $request)
    {
        $id=$request['id'];
        return Tbl_facility_type::where('id',$id)->update($request->all());
    }


    //facilities CRUD
    public function facility_registration(Request $request)
    {
		//return 1;
		$facility_name=$request['facility_name'];
		$check= Tbl_facility::where('facility_name',$facility_name)->first();
		if(count($check)==1)
		{
		return  $facility_name." "."Already Registered";
		}
		else{
		Tbl_facility::create($request->all());
		return  "SuccessFul!!!..";
		}
    }

    public function facility_list()
    {
        return Tbl_facility::get();
    }


    public function facility_delete($id)
    {

        return Tbl_facility::destroy($id);

    }

    public function facility_update(Request $request)
    {
        $id=$request['id'];
        return Tbl_facility::where('id',$id)->update($request->all());
    }
	
	//Get Facility
	public function getfacility(Request $request)
	{
		$user_id=$request['user_id']; 
		$facility_id=$request['facility_id'];
		return DB::table('users')
		->select('users.id as user_id','users.facility_id as userfacility_id','tbl_facilities.*','tbl_councils.*','tbl_council_types.*','tbl_regions.*','tbl_facility_types.*')
		->where('users.id',$user_id)
		->join('tbl_facilities',"users.facility_id","=","tbl_facilities.id")
		->join('tbl_councils',"tbl_facilities.council_id","=","tbl_councils.id")
		->join('tbl_council_types',"tbl_councils.council_types_id","=","tbl_council_types.id")
		->join('tbl_regions',"tbl_facilities.region_id","=","tbl_regions.id")
		->join('tbl_facility_types',"tbl_facilities.facility_type_id","=","tbl_facility_types.id")
        ->get();
	}
	
	//Get Facilities
	public function get_facilities(Request $request)
	{
		$user_id=$request['user_id']; 
		//return Tbl_facility::get();
		//$facility_id=$request['facility_id'];
		return DB::table('tbl_facilities')
		//->select('users.id as user_id','users.facility_id as userfacility_id','tbl_facilities.*','tbl_councils.*','tbl_council_types.*','tbl_regions.*','tbl_facility_types.*')
		->select('tbl_facilities.id as userfacility_id','tbl_facilities.*','tbl_councils.*','tbl_council_types.*','tbl_regions.*','tbl_facility_types.*')
		//->where('users.id',$user_id)
		//->join('tbl_facilities',"users.facility_id","=","tbl_facilities.id")
		->join('tbl_councils',"tbl_facilities.council_id","=","tbl_councils.id")
		->join('tbl_council_types',"tbl_councils.council_types_id","=","tbl_council_types.id")
		->join('tbl_regions',"tbl_facilities.region_id","=","tbl_regions.id")
		->join('tbl_facility_types',"tbl_facilities.facility_type_id","=","tbl_facility_types.id")
		->get();
	}
	
	//Get Facility
	public function getfacilityuser(Request $request)
	{
		$user_id=$request['user_id']; 
		$facility_id=$request['facility_id'];
		return DB::table('users')
		->select('users.id as user_id','users.*','tbl_facilities.*','tbl_facility_types.*','tbl_councils.*','tbl_council_types.*','tbl_regions.*','tbl_facility_types.*')
		//->where('users.id',$user_id)
		->where('users.facility_id',$facility_id)
		->join('tbl_facilities',"users.facility_id","=","tbl_facilities.id")
		->join('tbl_facility_types',"tbl_facilities.facility_type_id","=","tbl_facility_types.id")
		->join('tbl_councils',"tbl_facilities.council_id","=","tbl_councils.id")
		->join('tbl_council_types',"tbl_councils.council_types_id","=","tbl_council_types.id")
		->join('tbl_regions',"tbl_facilities.region_id","=","tbl_regions.id")
        ->get();
	}
	
	//Get all Facility user
	public function getallfacilityuser(Request $request)
	{
		$user_id=$request['user_id']; 
		$facility_id=$request['facility_id'];
		return DB::table('users')
		->select('users.id as user_id','users.*','tbl_facilities.*','tbl_facility_types.*','tbl_councils.*','tbl_council_types.*','tbl_regions.*','tbl_facility_types.*')
		//->where('users.id',$user_id)
		//->where('users.facility_id',$facility_id)
		->join('tbl_facilities',"users.facility_id","=","tbl_facilities.id")
		->join('tbl_facility_types',"tbl_facilities.facility_type_id","=","tbl_facility_types.id")
		->join('tbl_councils',"tbl_facilities.council_id","=","tbl_councils.id")
		->join('tbl_council_types',"tbl_councils.council_types_id","=","tbl_council_types.id")
		->join('tbl_regions',"tbl_facilities.region_id","=","tbl_regions.id")
        ->get();
	}
	
	//Get All Facility
	public function getallfacility(Request $request)
	{
		$user_id=$request['user_id']; 
		$facility_id=$request['facility_id'];
		return DB::table('tbl_facilities')
		//return DB::table('users')
		//->select('users.id as user_id','users.*','tbl_facilities.*','tbl_facility_types.*','tbl_councils.*','tbl_council_types.*','tbl_regions.*','tbl_facility_types.*')
		//->select('users.id as user_id','users.*','tbl_facilities.*','tbl_facility_types.*','tbl_councils.*','tbl_council_types.*','tbl_regions.*','tbl_facility_types.*')
		//->where('users.id',$user_id)
		//->where('users.facility_id',$facility_id)
		//->join('tbl_facilities',"users.facility_id","=","tbl_facilities.id")
		->select('tbl_facilities.id as userfacility_id','tbl_facilities.*')
		->join('tbl_facility_types',"tbl_facilities.facility_type_id","=","tbl_facility_types.id")
		->join('tbl_councils',"tbl_facilities.council_id","=","tbl_councils.id")
		->join('tbl_council_types',"tbl_councils.council_types_id","=","tbl_council_types.id")
		->join('tbl_regions',"tbl_facilities.region_id","=","tbl_regions.id")
        ->get();
	}
	
	//Update Facility
	public function updatefacility(Request $request)
	{
	$userfacility_id=$request['userfacility_id']; 
	$facility_code=$request['facility_code']; 
	$facility_name=$request['facility_name']; 
	$facility_type_id=$request['facility_type_id'];
	$addresss=$request['addresss']; 
	$mobile_number=$request['mobile_number']; 
	$email=$request['email']; 
	$council_id=$request['council_id']; 
	$region_id=$request['region_id'];
	
    $updatefacilityy = Tbl_facility::where('id',$userfacility_id)->update([
	//$request->all()
	'facility_code'=>$facility_code,    
	'facility_name' =>$facility_name,
	'facility_type_id' =>$facility_type_id,
	'address' =>$addresss,
	'mobile_number' =>$mobile_number,
	'email' =>$email,
	'council_id' =>$council_id,
	'region_id' =>$region_id
	]);
		if(count($updatefacilityy)==1){
            return response()->json(
			['msg'=>$facility_name ." Successful Updated..",
			'status'=>1
			]
			)  ;
        }
        else{
			 return response()->json(
			['msg'=>$facility_name ."Not Updated",
			'status'=>0
			]
			);
        }
	}
	
	  //register facility
    public function saveitem(Request $request)
    {
        $facility_name=$request['facility_name']; $facility_owner=$request['facility_owner'];
        $mobile_number=$request['mobile_number']; $email=$request['email'];
        $address=$request['address']; $facility_type_id=$request['facility_type_id'];
        $facility_motto=$request['facility_motto']; $council_id=$request['council_id'];
        $region_id=$request['region_id']; $facility_code=$request['facility_code']; 
		//$facility_code=001;
        if(patientRegistration::duplicate('tbl_facilities',array(
                'facility_name',
                "((timestampdiff(minute,created_at,CURRENT_TIMESTAMP) >=0))"),
                array($facility_name))==true){

            return response()->json([
                'msg' => $facility_name." ALREADY EXISTS",
                'status' =>0
            ]);
        }
        else{
            $data=tbl_facilities::create(array(
                'facility_name'=>$facility_name,
                'facility_owner'=>$facility_owner,
                'mobile_number'=>$mobile_number,
                'email'=>$email,
                'address'=>$address,
                'facility_type_id'=>$facility_type_id,
                'facility_motto'=>$facility_motto,
                'council_id'=>$council_id,
                'region_id'=>$region_id,
                'facility_code'=>$facility_code

            ));
            return response()->json(
                ['msg'=>$facility_name ." Successful Registered",
                    'status'=>1
                ]
            )  ;
        }
    }
	
	
	
}
