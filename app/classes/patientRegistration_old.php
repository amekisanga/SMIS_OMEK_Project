// <?php
// namespace App\classes;
// use DB;
// use App\Patient\Tbl_patient;
// use App\Patient\Tbl_next_of_kin;
// use App\Patient\Tbl_accounts_number;
// use App\Patient\Tbl_exemption_number;
// use App\Patient\Tbl_corpse;
// use DateTime;
// class patientRegistration
// {
	// public static function seachForPatients($request){
		// $searchKey = $request->input('searchKey');
        // $patientSearched=DB::table('vw_patients_search')
		// ->where('fullname','like','%'.$searchKey.'%')
		// ->orWhere('medical_record_number','like','%'.$searchKey.'%')
		// ->orWhere('account_number','like','%'.$searchKey.'%')
		// ->orwhere('mobile_number','like','%'.$searchKey.'%')
		// ->groupBy('patient_id')
		 // ->get();
		 
		 // return $patientSearched;
       	// }
		
		
		// public static function getMaritalStatus($request){
		// $searchKey = $request->input('searchKey');
        // $getMaritalStatus=DB::table('tbl_maritals')
		// ->where('marital_status','like','%'.$searchKey.'%')
		// ->get();		 
		 // return $getMaritalStatus;
       	// }
		
		
		// public static function getTribe($request){
		// $searchKey = $request->input('searchKey');
        // $getTribe=DB::table('tbl_tribes')
		// ->where('tribe_name','like','%'.$searchKey.'%')
		// ->get();		 
		 // return $getTribe;
       	// }
		
		// public static function getOccupation($request){
		// $searchKey = $request->input('searchKey');
        // $getTribe=DB::table('tbl_occupations')
		// ->where('occupation_name','like','%'.$searchKey.'%')
		// ->get();		 
		 // return $getTribe;
       	// }
		
		// public static function getCountry($request){
		// $searchKey = $request->input('searchKey');
        // $getCountry=DB::table('tbl_countries')
		// ->where('country_name','like','%'.$searchKey.'%')
		// ->get();		 
		// return $getCountry;
       	// }
		// public static function getRelationships($request){
		// $searchKey = $request->input('searchKey');
        // $getRelationships=DB::table('tbl_relationships')
		// ->where('relationship','like','%'.$searchKey.'%')
		// ->get();		 
		// return $getRelationships;
       	// }
	
	// public static function calculateDaysInterval($last_visit){
		// $today_date_time=date('Y-m-d h:i:s');
		// $bday = new DateTime($last_visit);
        // $today = new DateTime($today_date_time); 
        // $diff = $today->diff($bday);
		// return $diff->y.' Years '.$diff->m.' Month '.$diff->d.' Days ago' ;
       	// }
	
	
	
	
	// public static function calculatePatientAge($request){
		// $dob=$request->dob;
		// $today_date_time=date('Y-m-d h:i:s');
		// $bday = new DateTime($dob);
        // $today = new DateTime($today_date_time); 
        // $diff = $today->diff($bday);
		// return $diff->y.' Years '.$diff->m.' Month '.$diff->d.' Days' ;
       	// }
		
		
		// public static function duplicate($table,$fields, $values, $updating=false,  $updatingKey=0, $primaryKey='id'){
			// $query = "select count(*) as count from $table where ";
			// for($field = 0; $field < count($fields); $field++)
				// $query .= $fields[$field] .((strpos($fields[$field], "))") > 0) ? "" : "= '".$values[$field]."'"). (($field+1) < count($fields) ? " and " : "");
		
			// if($updating)
				// $query .= " and $primaryKey <> '$updatingKey'";
			// try{
				// $result = DB::select($query);
				// if($result[0]->count !=0){
					// $GLOBALS['data'] = array('message'=>array('type'=>'warning','simple'=>'Attempt to add a duplicate value','real'=>null), 'data'=>null);
					// return true;
				// }
			// return false;
			// }catch(QueryException $exception){
				// $GLOBALS['data'] = array('message'=>array('type'=>'error','simple'=>'An error occured while checking the new value','real'=>$exception->getMessage()), 'data'=>null);
				// return true;//cant check. return true to prevent blind insert
			// }

		// }
		
		
		
		// public static function calculateTimeDifference($created_at){
			// $to_time = strtotime(date('Y-m-d h:i:s'));
            // $from_time = strtotime($created_at);
            // return round(abs($to_time - $from_time) /(60* 60),2);		
       	// }
		
		
		
	
	
    // public static function patient_registration($request)
    // {
		
      
	    // $facility_id=$request->input('facility_id');
	    // $first_name=$request->input('first_name');
	    // $middle_name=$request->input('middle_name');
	    // $last_name=$request->input('last_name');
	    // $gender=$request->input('gender');
	    // $mobile_number=$request->input('mobile_number');
	    // $residence_id=$request->input('residence_id');
	    // $dob=$request->input('dob');
	    // $marital_status=$request->input('marital_status');
	    // $occupation=$request->input('occupation_id');
	    // $tribe_id=$request->input('tribe');
	    // $country_id=$request->input('country_id');
	    // $user_id=$request->input('user_id');
	    // $next_of_kin_name=$request->input('next_of_kin_name');
	    // $next_of_kin_resedence_id=$request->input('next_of_kin_resedence_id');
	    // $relationship=$request->input('relationship');
	    // $mobile_number_next_kin=$request->input('mobile_number_next_kin');
       // while(true){
       // $patientnumber = DB::table('tbl_patients')
	    // ->join('tbl_facilities', 'tbl_patients.facility_id', '=', 'tbl_facilities.id')
        // ->where('tbl_facilities.id',$facility_id)
        // ->orderBy('tbl_patients.id','DESC')
        // ->take(1)->get();

            // //$facility ='10001';
        // if(count($patientnumber)==1){
        // $CustomerExecute =  $patientnumber[0]->medical_record_number;
        // $TempArray = explode('/',$CustomerExecute);
        // $temp_array1 = $TempArray[0];
        // if( $TempArray[1]== date('Y') )
        // {
        // $TempArray_value = explode('-',$temp_array1);
        // $num1 = $TempArray_value[1];
        // $num2 = $TempArray_value[2];
        // $num3 = $TempArray_value[3];
        // if($num3 < 99) {  $num3 = $num3+1;   if(strlen($num3)==1) $num3 = '0'.$num3;  $account_number = $num1.'-'.$num2. '-'. $num3;  }
        // else if( $num3 ==99 && $num2 < 99 ) { $num3 = '00'; $num2 = $num2+1; if(strlen($num2)==1) $num2 = '0'.$num2;    $account_number = $num1.'-'.$num2. '-'. $num3;  }
        // else if( $num3 ==99 && $num2 == 99 && $num1 < 99) { $num3 = '00'; $num2 = '00';  $num1 = $num1+1; if(strlen($num1)==1) $num1 = '0'.$num1;   $account_number = $num1.'-'.$num2. '-'. $num3;  }
        // else { $num3 = '00'; $num2 = '00';  $num1 = $num1+1; if(strlen($num1)==1) $num1 = '0'.$num1;   $account_number = $num1.'-'.$num2. '-'. $num3;  }
        // $account_number  = $facility_id.'-'.$account_number.'/'.$TempArray[1];
        // }else{
        // $account_number  = $facility_id.'-00-00-01/'.date('Y');}
        // }else{
        // $account_number  = $facility_id.'-00-00-01/'.date('Y');
        // }
        // $ExecuteQuery = Tbl_patient::select('medical_record_number')->where('medical_record_number','=',$account_number)->count();
        // if($ExecuteQuery ==0){
	 // $patient =Tbl_patient::create(array('first_name'=>$first_name,'middle_name'=>$middle_name,'last_name'=>$last_name,'dob'=>$dob,'gender'=>$gender,
	 // 'medical_record_number'=>$account_number,'mobile_number'=>$mobile_number,'residence_id'=>$residence_id,'marital_id'=>$marital_status,'occupation_id'=>$occupation,
	 // 'tribe_id'=>$tribe_id,'country_id'=>$country_id,'facility_id'=>$facility_id,'user_id'=>$user_id));
			
        // //$patient = new Tbl_patient($request->all());
        // $patient['medical_record_number'] = $account_number;
        // if(!$patient->save())
        // continue;
        // $facility_id=$patient->facility_id;
        // $patient_id =$patient->id;
        // $user_id    =$patient->user_id;
		// if(!empty($next_of_kin_name)){
		// $next_kin =Tbl_next_of_kin::create(array('patient_id'=>$patient_id,'next_of_kin_name'=>$next_of_kin_name,'mobile_number'=>$mobile_number_next_kin,'residence_id'=>$next_of_kin_resedence_id,'relationship'=>$relationship));
		// $next_kin->save();
		// }
        // self::patientAccountNumber($facility_id,$patient_id);
                // //$this->checkForExemptionNumber($facility_id,$patient_id,$user_id);
               // // $this->corpsesNumber($facility_id,$patient_id,$user_id);
        // return $patient;
        // }else{
                // continue;
            // }

				// }
    // }



    // public static function corpsesNumber($facility_id,$patient_id,$user_id)
    // {
        // while(true){
            // $corpse_number = DB::table('tbl_corpses')
                // ->where('facility_id',$facility_id)
                // ->orderBy('id','DESC')
                // ->take(1)->get();
            // if(count($corpse_number)>0){
                // $CustomerExecute =  $corpse_number[0]->corpse_record_number;

                // $corpse_number  =str_pad($CustomerExecute+1,7,'0',STR_PAD_LEFT);
            // }else{
                // $corpse_number='0000001';
            // }

            // $ExecuteQuery = DB::table('tbl_corpses')
                // ->where('corpse_record_number',$corpse_number)
                // ->where('facility_id',$facility_id)
                // ->count();

            // if($ExecuteQuery ==0){
                // $patient = Tbl_corpse::create(array('corpse_record_number'=>$corpse_number,'facility_id'=>$facility_id,'patient_id'=>$patient_id,'user_id'=>$user_id));
                // if(!$patient->save())
                    // continue;
                // return $patient;
            // }else{
                // continue;
            // }
        // }
    // }




    // public static function patientAccountNumber($facility_id,$patient_id)
    // {
		// $account_number="";
        // while(true){
            // $patient_account_number = DB::table('tbl_accounts_numbers')
                // ->where('facility_id',$facility_id)
                // ->where('date_attended','LIKE','%'.date('Y-m').'%')
                // ->orderBy('id','DESC')
                // ->take(1)->get();
				
				
				
			// //$patient_account_number=json_decode($patient_account_number);
			// //return $patient_account_number;
            // if(count($patient_account_number)>0){
                // $CustomerExecute =  $patient_account_number[0]->account_number;
                // if(substr($CustomerExecute,-4,4) !=date('my')){
                    // $account_number  =$facility_id.'000001'.date('my');
                // }else{
// $account_number  =$facility_id.str_pad(((int)substr($CustomerExecute, -10,6)+1),6,'0',STR_PAD_LEFT).date('my');
                // }
            // }else{
                // $account_number  =$facility_id.'000001'.date('my');
            // }

            // $ExecuteQuery = DB::table('tbl_accounts_numbers')
                // ->where('account_number',$account_number)
                // ->where('facility_id',$facility_id)
                // ->where('date_attended','LIKE', date('Y-m').'%')
                // ->count();
            // if($ExecuteQuery ==0){
                // $patient = Tbl_accounts_number::create(array('account_number'=>$account_number,'facility_id'=>$facility_id,'patient_id'=>$patient_id,'date_attended'=>date('Y-m-d')));
                // if($patient->save())
					// return response()->json([
										// 'patient_id' => $patient->patient_id,
										// 'account_number' =>$patient->account_number,
                                        // 'data' => 'Succeffully Saved with Account_number',	
										// 'status' => '1'
										// ]);
				
				
            // }else{
                // continue;
            // }
        // }
    // }



    // public static function checkForExemptionNumber($facility_id,$patient_id,$user_id){
        // $is_patient_ExemptionNumber = DB::table('tbl_exemption_numbers')
            // ->where('patient_id',$patient_id)
            // ->orderBy('id','DESC')
            // ->take(1)->get();
        // if(count($is_patient_ExemptionNumber)>0){
            // echo "Client already have Exemption number.. ";
        // }	else{
           // // $this->patientExemptionNumber($facility_id,$patient_id,$user_id) ;

        // }


    // }
	
	// public static function getLastVisit($facility_id,$patient_id){
          // $getLastVisit= DB::table('tbl_accounts_numbers')
            // ->where('patient_id',$patient_id)
            // ->where('facility_id',$facility_id)
            // ->orderBy('id','DESC')
            // ->take(2)->get();
			
			// $getLastVisit=json_decode($getLastVisit);
			
			// //return $getLastVisit[0]->created_at;
			
        // if(count($getLastVisit)==1){
             // return response()->json([
										// 'registration_title' => 'FIRST REGISTRATION',
										// 'patient_id'=>$patient_id,
										// 'facility_id'=>$facility_id,
										// 'status' => '0'
										// ]);
        // }	else{
			// /**
			// $getLastVisit= Tbl_accounts_number::select('account_number','facility_id','created_at')
            // ->where('patient_id',$patient_id)
            // ->where('facility_id',$facility_id)
            // ->orderBy('id','ASC')
            // ->first();
			// **/
			// $last_visit=$getLastVisit[0]->created_at;
			// $last_ago=self::calculateDaysInterval($last_visit);
			
			// return response()->json([
										// 'registration_title' => 'LAST VISIT AT: '.$getLastVisit[0]->created_at.'('.$last_ago.')',
										// 'patient_id'=>$patient_id,
										// 'facility_id'=>$facility_id,
										// 'status' => '1'
										// ]);
																			
			

        // }


    // }

    // public static function patientExemptionNumber($facility_id,$patient_id,$user_id)
    // {
        // while(true){
            // $patient_ExemptionNumber = DB::table('tbl_exemption_numbers')
                // ->where('facility_id',$facility_id)
                // //->where('patient_id',$patient_id)
                // ->orderBy('id','DESC')
                // ->take(1)->get();
            // if(count($patient_ExemptionNumber)>0){
                // $CustomerExecute =  $patient_ExemptionNumber[0]->exemption_number;
                // if(substr($CustomerExecute,6,10) !=date('my')){
                    // $exemption_numbers  ='000001'.date('my');
                // }else{
                    // $exemption_numbers  =str_pad((substr($CustomerExecute,0,6)+1),6,'0',STR_PAD_LEFT).date('my');
                // }
            // }else{
                // $exemption_numbers  ='000001'.date('my');
            // }

            // $ExecuteQuery = DB::table('tbl_exemption_numbers')
                // ->where('exemption_number',$exemption_numbers)
                // ->where('facility_id',$facility_id)
                // ->count();


            // if($ExecuteQuery ==0){
                // $patient = Tbl_exemption_number::create(array('exemption_number'=>$exemption_numbers,'facility_id'=>$facility_id,'patient_id'=>$patient_id,'user_id'=>$user_id));
                // if(!$patient->save())
                    // continue;
                // return $exemption_numbers;
                // //return $patient;
            // }else{
                // continue;
            // }
        // }
    // }


// //	search Patient
	// //Generate Order Number for Laboratory Order
// public static function labOrderNumber($order_id)
		// {
		// $lab_OrderNumber = DB::table('tbl_orders')
		// ->where('order_id',$order_id)
		// ->where('sample_no',"!=","null")
		// ->orderBy('id','DESC')
		// ->take(1)->get();
		// if(count($lab_OrderNumber)>0){
		// $OrderNumber =  $lab_OrderNumber[0]->sample_no;
		// if(substr($OrderNumber,6,10) !=date('my')){
		// $laborder_numbers  ='000001'.date('my');
		// }else{
		// $laborder_numbers  =str_pad((substr
		// ($OrderNumber,0,6)+1),6,'0',STR_PAD_LEFT).date('my');
		// }
		// }else{
		// $laborder_numbers  ='000001'.date('my');
		// }
		// return $laborder_numbers;
		
		// }






// }
