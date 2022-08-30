<?php
namespace App\classes;
use DB;
use DateTime;
class patientRegistration
{    
		 public static function duplicate($table,$fields,$values,$updating=false,$updatingKey=0,$primaryKey='id'){
			 $query = "select count(*) as count from $table where ";
			 for($field = 0; $field < count($fields); $field++)
			 $query .= $fields[$field] .((strpos($fields[$field], "))") > 0) ? "" : "= '".$values[$field]."'"). (($field+1) < count($fields) ? " and " : "");
		
			 if($updating)
				 $query .= " and $primaryKey <> '$updatingKey'";
			 try{
				 $result = DB::select($query);
				 if($result[0]->count !=0){
					 $GLOBALS['data'] = array('message'=>array('type'=>'warning','simple'=>'Attempt to add a duplicate value','real'=>null), 'data'=>null);
					 return true;
				 }
			 return false;
			 }catch(QueryException $exception){
				 $GLOBALS['data'] = array('message'=>array('type'=>'error','simple'=>'An error occured while checking the new value','real'=>$exception->getMessage()), 'data'=>null);
				 return true;//cant check. return true to prevent blind insert
			 }

		 }
      
    


}
 