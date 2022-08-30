<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\admin\Tbl_permission;
use App\admin\Tbl_permission_user;
use App\admin\Tbl_permission_role;
use App\admin\Tbl_role;
use App\admin\Tbl_staff_photo;
use DB;
use App\Classes\systemViews;

class stateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function uploadEntry(Request $request){
      //laravel form submission
      /*  
      if($request->hasFile('uploadedFile')){
        $files = $request->file('uploadedFile');
        foreach ($files as $file) {  
            $fileName = rand(11111,99999).'.jpg';
            $file->move( 'uploads' , $fileName);
        }
      } */
       
      //angular API submission
       // return $request->all();
        $file =0; 
		//echo Input::hasFile($file);
        while (Input::hasFile($file)) {
          $destinationPath = 'uploads'; // upload path
          $fileName =  $request->photo_for.'-'.date('dmyhis').'-'.rand(11111,99999).'.jpg'; // renameing image
		  
          if(Input::file($file)->move($destinationPath, $fileName)){
	      $admin = new Tbl_staff_photo($request->all());
		  //return $admin;
		  $admin['photo_path']=$fileName;
		  $admin['photo_for']=$request->photo_for;
		  //return $admin;
		   // return response($admin, 101);
		  
		  
				if(!$admin->save()){
			   return response("Error Encounted: Failed to save", 101);
					
						}
	      return response("FILE WAS SUCCESSFULLY UPLOADED.", 200);
		  } else{
			  
			  return response("UNABLE TO UPLOAD FILE", 101);
		  
		  }// uploading file to given path
          $file++;
        }
   }
	 
	 
	 
	  	 
	 public function userView($facility_id){
        systemViews::useraccessLevel();
		systemViews::accessLevel();
		//systemViews::conceptDictionary();
		//systemViews::billsPayments($facility_id);
		systemViews::createUserDetails();	
		// systemViews::itemregistered();
		// systemViews::itemupdated();
		// systemViews::stockreport();
		// systemViews::transactionfloat();
		//systemViews::registrarServices();	
		//systemViews::residencesView();	
		//systemViews::patientsToPoS($facility_id);	
		//systemViews::departmentalReports($facility_id);	
		//systemViews::searchpatient();	
		//systemViews::pendingAdmission();	
		//systemViews::approvedAdmission();	
		//systemViews::createWardDetails();	
		//systemViews::createBedsDetails();	
		
		 	 }
	 
	 
	 
		 
	 public function checkIfisEmpty($item_name){
		 $this->item_name = (is_null($item_name) || empty($item_name) || strlen($item_name) < 1 ? NULL : $item_name);

    return $this->item_name;
		 
	 }
	 
	 public function geticon(){		 
		    $geticon=  DB::table('tbl_glyphicons')
						->get();
						return $geticon;
	 } 
	 
	 public function getUserImage($id){		 
		    $getphoto=  DB::table('tbl_staff_photos')
			            ->select('photo_path')
			            ->where('photo_for',$id)
			            ->orderBy('id','DESC')
						->get()->take(1);
					return $getphoto;
	 }
	 
	 
	 public function getPermissions(){		 
		    $permissions =  DB::table('tbl_permissions')
						->get();
						return $permissions;
	 }
	 
	 public function getRoles(){		 
		    $roles =  DB::table('tbl_roles')
						->get();
						return $roles;
	 }
	 
	 
	 public function getRoleName($role_id){		 
		    $role_name=  DB::table('tbl_roles')
						->select('title')
						->where('id',$role_id)
						->first();
						return $role_name->title;
	 }
	 
	 
	 public function getUserName($user_id){		 
		    $user_name=  DB::table('users')
						->select('name')
						->where('id',$user_id)
						->first();
						return   $user_name->name;
	 }
	 
	 
	 public function getPermissionName($permission_id){
                         //$permission_id=$request->input('permission_id');		 
		    $permission=  DB::table('tbl_permissions')
						->select('title')
						->where('id',$permission_id)
						->first();
						
						return $permission->title;
	 }
	 
	public function checkIfStateExists(Request $request){
				
		$state_name=$request->input('module');	
		    $state_if_exist= DB::table('tbl_permissions')
						->select('module')
						->where('module',$state_name)
						->first();
							//return $state_name;		
				if(count($state_if_exist)>0){					
					return $state_name.' , already exists .Register state with other name';
										
				}else{
				$admin = new Tbl_permission($request->all());
				if(!$admin->save()){
					return 'Error 101: System failed to save this Menu,try again';
					
						}else{
							return 'Success: The state name was successfully saved.';
					
						}		
		
		
	} 
	}	
	
	public function checkIfRoleExists(Request $request){
				
		$role_name=strtoupper($request->input('title'));		
		$task_performed=strtoupper($request->input('parent'));

     //return $task_performed;		
		
	    $role_if_exist= DB::table('tbl_roles')
						->select('title')
						->where('title',$role_name)
						->where('parent',$task_performed)
						->first();
							//return $state_name;		
				if(count($role_if_exist)>0){					
					return $task_performed.' , already assigned to '.$role_name.'.Register another ROLE TASK ';
										
				}else{
				$admin = new Tbl_role($request->all());
				if(!$admin->save()){
					return 'Error 101: System failed to save this Role,try again';
					
						}else{
							return 'Success: The ROLE name was successfully saved.';
					
						}	
		
	} 
	}
	
	
	
	 // ASSIGN PERMISSIONS AND USERS
	public function checkIfPermissionUserExists(Request $request){
				
		$permission_id=strtoupper($request->input('permission_id'));		
		$user_id=strtoupper($request->input('user_id'));	
		
		$permission_user_if_exist= DB::table('tbl_permission_users')
						->where('permission_id',$permission_id)
						->where('user_id',$user_id)
						->first();
									
				if(count($permission_user_if_exist)>0){					
		return $this->getPermissionName($permission_id).' ,already assigned to '.$this->getUserName($user_id).' Register PERMISSION';
										
				}else{
				$admin = new Tbl_permission_user($request->all());
				if(!$admin->save()){
					return 'Error 101: System failed to save this Role,try again';
					
						}else{
	return $this->getPermissionName($permission_id).' was successfully assigned to '.$this->getUserName($user_id);
					
						}	
		
	} 
	}
	 // ASSIGN PERMISSIONS AN ROLES
	public function checkIfPermissionRoleExists(Request $request){
			

			
		$permission_id=strtoupper($request->input('permission_id'));		
		$role_id=strtoupper($request->input('role_id'));	
		
		$permission_role_if_exist= DB::table('tbl_permission_roles')
						->where('permission_id',$permission_id)
						->where('role_id',$role_id)
						->first();
						
							
							if(count($permission_role_if_exist)>0){					
		return $this->getRoleName($role_id).' ,already assigned to '.$this->getPermissionName($permission_id);
										
				}else{
				$admin = new Tbl_permission_role($request->all());
					
		
	               }	
				   
				   if(!$admin->save()){
				return 'Error 101: '.$this->getPermissionName($permission_id).' was UNSUCCESSFULY assigned to '.$this->getRoleName($role_id);;
					
						}else{
				return $this->getPermissionName($permission_id).' was successfully assigned to '.$this->getRoleName($role_id);
					
						}
				   
							
						
									
			 
	}  
	 
	 
}
