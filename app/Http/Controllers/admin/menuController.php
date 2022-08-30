<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class menuController extends Controller
{
	
    public function getUserMenu($user_id){
		
	return DB::table('vw_user_access_level')
									->select('state_p','descr','user_type','icons')
									->where('user_id',$user_id)
									->where('allowed',1)
									->where('is_it_allowed_to_access',1)
									->orderBy('descr','ASC')
                                    ->groupBy('state_p')									
									->take(20)->get();
	}
	
	public function getAuthorization($user_id,$state_name){
		
	$authorization_number= DB::table('vw_user_access_level')
									->select('state_p','descr','user_type','icons')
									->where('user_id',$user_id)
									->where('state_p',$state_name)
									->where('allowed',1)
									->where('is_it_allowed_to_access',1)
									->orderBy('descr','ASC')			
									->first();
									
									return count(array($authorization_number));
	}
	
	
	
	
}
