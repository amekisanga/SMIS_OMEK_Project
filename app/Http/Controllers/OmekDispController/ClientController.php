<?php

namespace App\Http\Controllers\OmekDispController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\OmekDispensary\Tbl_client;

class ClientController extends Controller
{
	
	//Post return client residence based on facility
	public function postclientresidence(Request $request)
	{
		$search=$request['SearchItem']; 
		$facility_id=$request['facility_id'];
		return DB::table('tbl_client_residences')
			->where('residence_name','like','%'.$search.'%')
            ->where('facility_id',$facility_id)
            ->get();
	}
	
	//Post return client gender based on facility
	public function postclientgender(Request $request)
	{
		$search=$request['SearchItem']; 
		$facility_id=$request['facility_id'];
		return DB::table('tbl_client_genders')
			->where('gender_name','like','%'.$search.'%')
            ->where('facility_id',$facility_id)
            ->get();
	}
	
	//Post return client occupation based on facility
	public function postclientoccupation(Request $request)
	{
		$search=$request['SearchItem']; 
		$facility_id=$request['facility_id'];
		return DB::table('tbl_client_occupations')
			->where('occupation_name','like','%'.$search.'%')
            ->where('facility_id',$facility_id)
            ->get();
	}
	 
	//Save Client Registration Data
	public function postclientregistration(Request $request)
	{
		$client_name=$request->input('client_name');
	    $client_age=$request->input('client_age');
		$client_mobile=$request->input('client_mobile');
		$client_gender_id=$request->input('client_gender_id');
		$client_residence_id=$request->input('client_residence_id');
		$client_occupation_id=$request->input('client_occupation_id');
		$facility_id=$request->input('facility_id');
		$user_who_registered_client=$request->input('user_who_registered_client');
		
		 while(true){
       $clientreginumber = DB::table('tbl_clients')
	    ->join('tbl_facilities', 'tbl_clients.facility_id', '=', 'tbl_facilities.id')
        ->where('tbl_facilities.id',$facility_id)
        ->orderBy('tbl_clients.id','DESC')
        ->take(1)->get();

            $facility ='10001';
        if(count($clientreginumber)==1){
        $CustomerExecute =  $clientreginumber[0]->client_registration_no;
        $TempArray = explode('/',$CustomerExecute);
        $temp_array1 = $TempArray[0];
        if( $TempArray[1]== date('Y') )
        {
        $TempArray_value = explode('-',$temp_array1);
        $num1 = $TempArray_value[1];
        $num2 = $TempArray_value[2];
        $num3 = $TempArray_value[3];
        if($num3 < 99) {  $num3 = $num3+1;   if(strlen($num3)==1) $num3 = '0'.$num3;  $account_number = $num1.'-'.$num2. '-'. $num3;  }
        else if( $num3 ==99 && $num2 < 99 ) { $num3 = '00'; $num2 = $num2+1; if(strlen($num2)==1) $num2 = '0'.$num2;    $account_number = $num1.'-'.$num2. '-'. $num3;  }
        else if( $num3 ==99 && $num2 == 99 && $num1 < 99) { $num3 = '00'; $num2 = '00';  $num1 = $num1+1; if(strlen($num1)==1) $num1 = '0'.$num1;   $account_number = $num1.'-'.$num2. '-'. $num3;  }
        else { $num3 = '00'; $num2 = '00';  $num1 = $num1+1; if(strlen($num1)==1) $num1 = '0'.$num1;   $account_number = $num1.'-'.$num2. '-'. $num3;  }
        $account_number  = $facility_id.'-'.$account_number.'/'.$TempArray[1];
        }else{
        $account_number  = $facility_id.'-00-00-01/'.date('Y');}
        }else{
        $account_number  = $facility_id.'-00-00-01/'.date('Y');
        }
        $ExecuteQuery = Tbl_client::select('client_registration_no')->where('client_registration_no','=',$account_number)->count();
        if($ExecuteQuery ==0){
	 $patient =Tbl_client::create(array(
	 'client_name'=>$client_name,
	 'client_registration_no'=>$account_number,
	 'client_age'=>$client_age,
	 'client_mobile'=>$client_mobile,
	 'facility_id'=>$facility_id,
	 'gender_id'=>$client_gender_id,
	 'occupation_id'=>$client_occupation_id,
	 'residence_id'=>$client_residence_id,
	 'user_id'=>$user_who_registered_client)
	 );
        return $patient;
        }else{
                continue;
            }

				}
	}
	
	//Get Registered Client
	public function getregisteredclient($facility_id)
	{ 
		return DB::table('tbl_clients')
            ->where('tbl_clients.facility_id',$facility_id)
			->select
		 ('tbl_clients.*',
		 'tbl_client_genders.id','tbl_client_genders.gender_name',
		 'tbl_facilities.id','tbl_facilities.facility_name',
		 'tbl_client_occupations.id','tbl_client_occupations.occupation_name',
		 'tbl_client_residences.id','tbl_client_residences.residence_name',
		 'users.id','users.name'
		 
		 )
			->join('tbl_client_genders',"tbl_clients.gender_id","=","tbl_client_genders.id")
			->join('tbl_facilities',"tbl_clients.facility_id","=","tbl_facilities.id")
			->join('tbl_client_occupations',"tbl_clients.occupation_id","=","tbl_client_occupations.id")
			->join('tbl_client_residences',"tbl_clients.residence_id","=","tbl_client_residences.id")
			->join('users',"tbl_clients.user_id","=","users.id")
            ->get();
	}
	
	 // Get Client to Serve
	 public function getclienttoserve(Request $request)
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
