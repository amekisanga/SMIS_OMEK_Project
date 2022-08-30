<?php
namespace App\classes;
use DB;
    class systemViews{
		
	public static function createUserDetails(){
					 $login_user_details="CREATE OR REPLACE VIEW `vw_user_details` AS (SELECT 
                     t1.id as user_id,
					 t1.name,
					 t1.email,
					 t1.mobile_number,
				     t1.gender,
					 t1.facility_id,
					 t1.proffesionals_id,
				     t2.prof_name,
					 t3.facility_code,
					 t3.facility_name,
					 t3.address as facility_address,
					 t3.mobile_number as facility_mobile_number,
					 t3.email as facility_email,
					 t5.council_name,
					 t6.region_name
					 FROM users t1, 
					 tbl_proffesionals t2, 
					 tbl_facilities t3, 
					 tbl_facility_types t4,
					 tbl_councils t5,
					 tbl_regions t6
					 WHERE t3.region_id=t6.id AND  t3.council_id=t5.id AND t3.facility_type_id=t4.id AND t1.proffesionals_id=t2.id  AND t1.facility_id=t3.id)";	
		
					 return DB::statement($login_user_details);
					}
									
					
	public static function accessLevel(){
				    $vw_user_level="CREATE OR REPLACE VIEW `vw_user_level` AS (SELECT 
					t4.module as state_p, 
					t5.grant as allowed,
					t4.title as descr,
					t4.id as permission_id,
					t4.glyphicons as icons,
					t1.title as user_type 
					FROM tbl_permission_roles t5, 
					tbl_roles t1 , 
					tbl_permissions t4 
					WHERE  t5.role_id=t1.id 
					AND t5.permission_id=t4.id )";	
		
					 return DB::statement($vw_user_level);
					}
					
					
	public static function useraccessLevel(){
				    self::accessLevel();
					$vw_user_access_level="CREATE OR REPLACE VIEW `vw_user_access_level` AS (SELECT
					t3.state_p, 
					t3.allowed,
					t3.descr,
					t3.user_type ,
					t3.icons,
					t1.user_id,
					t1.grant as is_it_allowed_to_access
					FROM tbl_permission_users t1,
					vw_user_level t3
					WHERE  t1.permission_id=t3.permission_id)";
							
					 return DB::statement($vw_user_access_level);
					}
					
					
	// public static function transactionfloat(){
		
					// $transactionfloat="CREATE OR REPLACE VIEW `VW_TRANSACTION_FLOAT` AS (
					// SELECT  
					// t1.id as company_id,
					// t1.company_name,
					// t2.amount,
					// t2.id as transaction_record_id,
					// t2.facility_id as trecord_facility_id,
					// t2.user_id as trecord_user_id,
					// t2.status as trecord_status
					
					// FROM 
					// tbl_transaction_companies t1, 
					 // tbl_transaction_records t2,
					 // tbl_facilities t3,
					// users t4
					
					// WHERE 
						// t2.company_id=t1.id
					// AND t2.facility_id=t3.id
					// AND t2.user_id=t4.id
					// )";
					// return DB::statement($transactionfloat);
	// }
	
	// public static function itemregistered(){
		
		// $itemregistered="CREATE OR REPLACE VIEW `VW_ITEM_REGISTERED` AS (
		// SELECT  
		// t1.id as item_id,
		// t1.item_name,
		// t1.buying_price,
		// t1.selling_price,
		// t1.quantity,
		// t1.reorder_level,
		// t1.status,
		// t1.item_type as itemtype,
		// t1.facility_id as itemfacility_id,
		// t1.user_id,
		// t1.batch_id,
		// t2.status as typeitem_status,
		// t2.item_type as itemtyp,
		// t3.department_name,
		// t4.unit,
		// t4.status as itemnit_status,
		// t5.facility_name,
		// t5.facility_code,
		// t6.name
		
        // FROM 
		// tbl_items t1, 
        // tbl_type_items t2,
        // tbl_departments t3,
        // tbl_item_units t4,
        // tbl_facilities t5,
        // users t6
		
		// WHERE 
		    // t1.item_type=t2.id
		// AND t1.department_id=t3.id
		// AND t1.unit_id=t4.id
		// AND t1.facility_id=t5.id
		// AND t1.user_id=t6.id
		// )";
		
		// return DB::statement($itemregistered);
	// }
	
	// public static function itemupdated(){
		
		// $itemupdated="CREATE OR REPLACE VIEW `VW_ITEM_UPDATED` AS (
		// SELECT  
		// t1.id as item_records_id,
		// t1.item_name,
		// t1.	buying_price_old,
		// t1.	buying_price_new,
		// t1.selling_price_old,
		// t1.selling_price_new,
		// t1.quantity_old,
		// t1.quantity_new,
		// t1.quantity_bought,
		// t1.reorder_level,
		// t1.status,
		// t1.item_type as itemtype,
		// t1.facility_id as itemfacility_id,
		// t1.user_id,
		// t1.date_bought,
		// t1.time_bought,
		// t2.status as typeitem_status,
		// t2.item_type as itemtyp,
		// t3.department_name,
		// t4.unit,
		// t4.status as itemnit_status,
		// t5.facility_name,
		// t5.facility_code,
		// t6.name
		
        // FROM 
		// tbl_item_records t1, 
        // tbl_type_items t2,
        // tbl_departments t3,
        // tbl_item_units t4,
        // tbl_facilities t5,
        // users t6
		
		// WHERE 
		    // t1.item_type=t2.id
		// AND t1.department_id=t3.id
		// AND t1.unit_id=t4.id
		// AND t1.facility_id=t5.id
		// AND t1.user_id=t6.id
		// AND t1.date_bought=DATE(NOW())
		// )";
		// return DB::statement($itemupdated);
	// }
	
	// public static function stockreport(){
		
		// $stockreport="CREATE OR REPLACE VIEW `VW_STOCK_REPORT` AS (
		// SELECT  
		// t1.id as tb_sales_id,
		// t1.item_id as tb_sales_item_id,
		// t1.batch_id as tb_sales_batch_id,
		// t1.quantity_sold as tb_sales_quantity_sold,
		// t1.quantity_sold_amount as tb_sales_quantity_sold_amount,
		// t1.user_id as tb_sales_user_id,
		// t1.date_sold as tb_sales_date_sold,
		// t1.time_sold as tb_sales_time_sold,
		// t1.facility_id as tb_sales_facility_id,
		// t1.sale_profit as tb_sales_sale_profit,
		// t1.created_at as tb_sales_created_at,
		// t1.updated_at as tb_sales_updated_at,
		// t2.id as tbl_items_id,
		// t2.item_name as tbl_items_item_name,
		// t2.department_id as tbl_items_department_id,
		// t3.id as tbl_batches_id,
		// t3.batch_name as tbl_batches_batch_name,
		// t4.id as tbl_user_id,
		// t4.name as user_name,
		// t5.id as tbl_facilities_id,
		// t5.facility_code as tbl_facilities_facility_code,
		// t5.facility_name as tbl_facilities_facility_name,
		// t6.id as tbl_department_department_id,
		// t6.department_name as tbl_department_department_name
		
        // FROM 
		// tbl_sales t1,
		// tbl_items t2,
		// tbl_batches t3,
		// users t4,
		// tbl_facilities t5,
		// tbl_departments t6
		
		// WHERE
		
		// t1.item_id=t2.id
		// AND
		// t1.batch_id=t3.id
		// AND
		// t1.user_id=t4.id
		// AND
		// t1.facility_id=t5.id
		// AND
		// t2.department_id=t6.id
		// )";
		// return DB::statement($stockreport);
	// }
		
					
}