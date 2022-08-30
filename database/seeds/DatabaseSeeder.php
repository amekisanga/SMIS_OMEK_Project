<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Department\Tbl_department;
use App\Country\Tbl_country;
use App\Country\Tbl_country_zone;
use App\Marital\Tbl_marital;
use App\Professional\Tbl_proffesional;
use App\Region\Tbl_region;
use App\Council\Tbl_council_type;
use App\Council\Tbl_council;
use App\Facility\Tbl_facility_type;
use App\Facility\Tbl_facility;
use App\Residence\Tbl_residence;
use App\admin\Tbl_permission;
use App\admin\Tbl_role;
use App\admin\Tbl_permission_user;
use App\admin\Tbl_permission_role;
use App\Dukani\Tbl_status;
use App\Glyphicon\Tbl_glyphicon;
use App\OmekDispensary\Tbl_client_residence;
use App\OmekDispensary\Tbl_client_gender;
use App\OmekDispensary\Tbl_client_occupation;
use App\OmekDispensary\Tbl_item_type;
use App\OmekDispensary\Tbl_item_category;
use App\OmekDispensary\Tbl_item_batch;
use App\OmekDispensary\Tbl_item_department;
use App\OmekDispensary\Tbl_item_unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
		//Eloquent::unguard();

		Schema::disableForeignKeyConstraints();
		DB::table('tbl_country_zones')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_countries')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_regions')->truncate();
		Schema::enableForeignKeyConstraints();
		
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_council_types')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_councils')->truncate();
		Schema::enableForeignKeyConstraints();
				
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_facility_types')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_facilities')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_departments')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_proffesionals')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_residences')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('users')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_roles')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_permissions')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_permission_users')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_permission_roles')->truncate();
		Schema::enableForeignKeyConstraints(); 

		Schema::disableForeignKeyConstraints();
		DB::table('tbl_statuses')->truncate();
		Schema::enableForeignKeyConstraints();	

		Schema::disableForeignKeyConstraints();
		DB::table('tbl_client_residences')->truncate();
		Schema::enableForeignKeyConstraints();	

		Schema::disableForeignKeyConstraints();
		DB::table('tbl_client_genders')->truncate();
		Schema::enableForeignKeyConstraints();		
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_client_occupations')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_item_types')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_item_categories')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_item_departments')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_item_batches')->truncate();
		Schema::enableForeignKeyConstraints();
		
		Schema::disableForeignKeyConstraints();
		DB::table('tbl_item_units')->truncate();
		Schema::enableForeignKeyConstraints();
		 
	   $country_zones= array(
                ['country_zone' => 'EAST AFRICA'],
                ['country_zone' =>'WEST AFRICA'],
                     ); 
					 
		 $countries= array(
                ['country_name' => 'TANZANIA','country_zone_id' =>1],
				                   );
					 
		$roles= array(
                ['title' => 'SUPPER ADMIN','parent' => 'SUPPER SYSTEM ADMINISTRATOR'],
                
                     );
					 
		 $council_types= array(
                ['description' => 'TOWN COUNCIL'],
                ['description' => 'DISTRICT COUNCIL'],
                ['description' => 'MUNICIPAL COUNCIL'],
                ['description' => 'CITY COUNCIL'],                
                     );
					 
		$facility_types= array(
                ['description' => 'Dispensary'],
				['description' => 'Health Facility'],
                     );
					 
		$councils= array(
                ['council_code' => '0001',
                'council_name' => 'UBUNGO',
                'regions_id' => 1,
                'council_types_id' =>1
				],                
                     );
					 
		$facilities= array(
                ['facility_code' => '001',
                'facility_name' => 'OMEK Dispensary',
                'facility_type_id' =>1,
                'address' =>'P.O.BOX 62864, DAR ES SALAAM',
                'region_id' => 1,
                'council_id' =>1,                
                'mobile_number' =>'+255714580688',                
                'email' =>'omekdispensary@gmail.com',
				],                
                     );
					 
		$residences= array(
                ['residence_name' => 'UBUNGO','council_id' =>1], 
				['residence_name' => 'EXTERNAL','council_id' =>1],
				['residence_name' => 'RIVERSIDE','council_id' =>1],                
                     );
					 
		$proffesionals= array(
                ['prof_name' => 'Registered Nurse'],
                ['prof_name' => 'Clinical Officer'],				
                ['prof_name' => 'Medical Officer'],				
                     );
			
					 
		$glyphicons= array(
		['icon_class' => 'update','icon_name' => 'glyphicon-plus','facility_id' => 1],
		);
					 
		$permissions = array(
		        ['main_menu' =>1,'module' => 'addRoles','glyphicons' => '','title' => 'ADD ROLES','keyGenerated'=>''],
		        ['main_menu'=>1,'module' => 'addModules','glyphicons' => '','title' => 'MENU/STATE REGISTER','keyGenerated'=>''],
		        ['main_menu'=>1,'module' => 'addPermUser','glyphicons' => '','title' => 'ADD PERMISSION USERS','keyGenerated'=>''],
		        ['main_menu'=>1,'module' => 'addPermRole','glyphicons' => '','title' => 'ADD PERMISSION ROLES','keyGenerated'=>''],				
		        ['main_menu'=>1,'module' => 'addViews','glyphicons' => '','title' => 'CREATE VIEWS','keyGenerated'=>''],
				['main_menu'=>1,'module' => 'addUserImage','glyphicons' => '','title' => 'UPLOAD USER PHOTO','keyGenerated'=>''],
				['main_menu'=>1,'module' => 'clientRegistration','glyphicons' => '','title' => 'CLIENT REGISTRATION','keyGenerated'=>''],
				['main_menu'=>1,'module' => 'itemsale','glyphicons' => '','title' => 'ITEM SALE','keyGenerated'=>''],
				['main_menu'=>1,'module' => 'report','glyphicons' => '','title' => 'REPORT','keyGenerated'=>''],
				['main_menu'=>1,'module' => 'reporttwo','glyphicons' => '','title' => 'REPORT TWO','keyGenerated'=>''],
				['main_menu'=>1,'module' => 'itemmanagement','glyphicons' => '','title' => 'ITEM REGISTER','keyGenerated'=>''],
				['main_menu'=>1,'module' => 'itemupdate','glyphicons' => '','title' => 'ITEM UPDATE','keyGenerated'=>''],
				// ['main_menu'=>1,'module' => 'itemmanage','glyphicons' => '','title' => 'ITEM MANAGE','keyGenerated'=>''],
				);					
					
		$permission_roles = array(
		        ['permission_id' => 1,'role_id' =>1,'grant' =>1],
		        ['permission_id' => 2,'role_id' =>1,'grant' =>1],
		        ['permission_id' => 3,'role_id' =>1,'grant' =>1],
		        ['permission_id' => 4,'role_id' =>1,'grant' =>1],				
		        ['permission_id' => 5,'role_id' =>1,'grant' =>1],
				['permission_id' => 6,'role_id' =>1,'grant' =>1],
				['permission_id' => 7,'role_id' =>1,'grant' =>1],
				['permission_id' => 8,'role_id' =>1,'grant' =>1],
				['permission_id' => 9,'role_id' =>1,'grant' =>1],
				['permission_id' => 10,'role_id' =>1,'grant' =>1],
				['permission_id' => 11,'role_id' =>1,'grant' =>1],
				['permission_id' => 12,'role_id' =>1,'grant' =>1],
				// ['permission_id' => 13,'role_id' =>1,'grant' =>1],
				);
					 
		$permission_users = array(
		        ['permission_id' => 1,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 2,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 3,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 4,'user_id' =>1,'grant' =>1],				
		        ['permission_id' => 5,'user_id' =>1,'grant' =>1],
				['permission_id' => 6,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 7,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 8,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 9,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 10,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 11,'user_id' =>1,'grant' =>1],
		        ['permission_id' => 12,'user_id' =>1,'grant' =>1],
				// ['permission_id' => 13,'user_id' =>1,'grant' =>1],
		        );
	      
	   
	   $regions = array(
		        ['region_code' => '01','region_name' =>'DODOMA'],
                     );
					
										 
		$departments = array(
                ['department_name' => 'OPD', 'facility_id' => 1],
                ['department_name' => 'LABORATORY', 'facility_id' => 1],
                     );
					 
		$statuses = array(
				['status_name' => 'Active', 'status' => 1, 'facility_id' => 1],
                ['status_name' => 'Not_Active', 'status' => 0, 'facility_id' => 1],
				);
				 
	   $users = array(
                ['name' => 'SUPPER ADMIN', 
				'email' => 'amekisanga@gmail.com',
				'password' => Hash::make('12345678'),
				'mobile_number' => '0714580688',
				'gender' => 'MALE',
				'facility_id' => 1,
				'proffesionals_id' =>1
				],
							
				//['name' => 'ASS SUPPER ADMIN', 
				//'email' => 'hello@tamisemi.go.tz',
				//'password' => Hash::make('12345678'),
				//'mobile_number' => '0652576368',
				//'gender' => 'MALE',
				//'facility_id' => 1,
				//'proffesionals_id' =>2
				//],
				);
				
			
		$client_residence= array(
                ['residence_name' => 'KIBANGU','facility_id' =>1], 
				['residence_name' => 'MAKOKA','facility_id' =>1],
				['residence_name' => 'MAKUBURI','facility_id' =>1],
				['residence_name' => 'RIVERSIDE','facility_id' =>1],
				['residence_name' => 'MBEZI','facility_id' =>1],
				['residence_name' => 'MAJI CHUMVI','facility_id' =>1],
				['residence_name' => 'TABATA','facility_id' =>1],
                     );
					 
		$client_gender= array(
                ['gender_name' => 'Male','facility_id' =>1], 
				['gender_name' => 'Female','facility_id' =>1],
                     );
					 
		$client_occupation= array(
                ['occupation_name' => 'Mkulima','facility_id' =>1], 
				['occupation_name' => 'Afisa Tehama','facility_id' =>1],
                     );	
					 
		$item_of_type= array(
                ['item_type' => 'Syrup', 'status'=>1,'facility_id' =>1],
                ['item_type' => 'tablets', 'status'=>1,'facility_id' =>1],
                ['item_type' => 'capsule', 'status'=>1,'facility_id' =>1],
                     );
					 
		$item_category= array(
                ['item_category' => 'dawa', 'status'=>1,'facility_id' =>1],
                ['item_category' => 'huduma', 'status'=>1,'facility_id' =>1],
                     );	
					 
		$item_department= array(
                ['item_department' => 'Pharmarcy', 'status'=>1,'facility_id' =>1],
                ['item_department' => 'Registration', 'status'=>1,'facility_id' =>1],
                ['item_department' => 'Re_attendacy', 'status'=>1,'facility_id' =>1],
                ['item_department' => 'RCH', 'status'=>1,'facility_id' =>1],
                ['item_department' => 'OPD_Doctor', 'status'=>1,'facility_id' =>1],
                ['item_department' => 'laboratory', 'status'=>1,'facility_id' =>1],
                     );	
					 
		$item_batch= array(
                ['item_batch' => 'one', 'status'=>1,'facility_id' =>1],
                ['item_batch' => 'two', 'status'=>1,'facility_id' =>1],
                ['item_batch' => 'three', 'status'=>1,'facility_id' =>1],
                ['item_batch' => 'four', 'status'=>1,'facility_id' =>1],
                ['item_batch' => 'five', 'status'=>1,'facility_id' =>1],
				['item_batch' => 'six', 'status'=>1,'facility_id' =>1],
                ['item_batch' => 'seven', 'status'=>1,'facility_id' =>1],
                ['item_batch' => 'eight', 'status'=>1,'facility_id' =>1],
                ['item_batch' => 'nine', 'status'=>1,'facility_id' =>1],
                ['item_batch' => 'ten', 'status'=>1,'facility_id' =>1],
                     );	
					 
		$item_unit= array(
                ['item_units' => 'litter', 'status'=>1,'facility_id' =>1],
                ['item_units' => 'peaces', 'status'=>1,'facility_id' =>1],
                ['item_units' => 'boxes', 'status'=>1,'facility_id' =>1],
                ['item_units' => 'tablet', 'status'=>1,'facility_id' =>1],
                     );							 
				                  
        // Loop through each admission  above and create the record for them in the database
        foreach ($country_zones as  $country_zone)
        {
            Tbl_country_zone::create($country_zone); 
        } 
		
		foreach ($countries as  $country)
        {
            Tbl_country::create($country);
        }
		
		foreach ($regions as $region)
        {
            Tbl_region::create($region);
        }
		
		foreach ($council_types as $council_type)
        {
            Tbl_council_type::create($council_type);
        }
		
		foreach ($councils as $council)
        {
            Tbl_council::create($council);
        }
		
		foreach ($facility_types as $facility_type)
        {
            Tbl_facility_type::create($facility_type);
        }
		
		foreach ($facilities as $facility)
        {
            Tbl_facility::create($facility);
        }
		
		foreach ($departments as $department)
        {
            Tbl_department::create($department);
        }
		
		foreach ($proffesionals as $proffesional)
        {
            Tbl_proffesional::create($proffesional);
        }
		
		foreach ($residences as $residence)
        {
            Tbl_residence::create($residence);
        }	
		
		foreach ($users as $user)
        {
            User::create($user);
        }
		
		foreach ($permissions as $permission)
        {
            tbl_permission::create($permission);
        }
		
		foreach ($roles as $role)
        {
            Tbl_role::create($role);
        }
		
		foreach ($permission_users as $permission_user)
        {
            Tbl_permission_user::create($permission_user);
        }
		
		foreach ($permission_roles as $permission_role)
        {
            Tbl_permission_role::create($permission_role);
        }
		
		foreach ($statuses as $status)
        {
            Tbl_status::create($status);
        }
			
		foreach ($glyphicons as $glyphicon)
        {
         Tbl_glyphicon::create($glyphicon);
        }
		
		foreach ($client_residence as $clientresidence)
        {
            Tbl_client_residence::create($clientresidence);
        }
		
		foreach ($client_gender as $clientgender)
        {
            Tbl_client_gender::create($clientgender);
        }
		
		foreach ($client_occupation as $clientoccupation)
        {
            Tbl_client_occupation::create($clientoccupation);
        }
		
		foreach ($item_of_type as $itemtypes)
		{
			Tbl_item_type::create($itemtypes);
		}
		
		foreach ($item_category as $itemcategory)
		{
			Tbl_item_category::create($itemcategory);
		}
		
		foreach ($item_department as $itemdepartment)
		{
			Tbl_item_department::create($itemdepartment);
		}
		
		foreach ($item_batch as $itembatch)
		{
			Tbl_item_batch::create($itembatch);
		}
		
		foreach ($item_unit as $itemunit)
		{
			Tbl_item_unit::create($itemunit);
		}
        //Model::reguard();
		//Eloquent::reguard();
    }
}
