<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
	Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
	
	//SYSTEM MENU CONTROLLER   @ AME O. KISANGA
	 Route::get('getUsermenu/{id}', 'admin\menuController@getUserMenu');
	 Route::get('getAuthorization/{id},{state_name}', 'admin\menuController@getAuthorization');
	 Route::post('addPermission', 'admin\stateController@checkIfStateExists');
	 Route::post('addRoles', 'admin\stateController@checkIfRoleExists');
	 Route::post('perm_user', 'admin\stateController@checkIfPermissionUserExists');
	 Route::post('perm_role', 'admin\stateController@checkIfPermissionRoleExists');
	 Route::get('geticon', 'admin\stateController@geticon');
	 Route::get('getPerm', 'admin\stateController@getPermissions');
	 Route::get('getPermName/{id}', 'admin\stateController@getPermissionName');
	 Route::get('getUserName/{id}', 'admin\stateController@getUserName');
	 Route::get('getRoles', 'admin\stateController@getRoles');
	 Route::get('userView/{id}', 'admin\stateController@userView');
	 Route::post('fileupload', 'admin\stateController@uploadEntry');
	 Route::get('getUserImage/{id}', 'admin\stateController@getUserImage');
	 Route::get('user_list', 'User\UsersRegistrationController@user_list');
	 
	 //OMEK ROUTES @ AME KISANGA 8/2/2021 
	 Route::get('get_client_residence/{facility_id}', 'OmekDispController\ClientController@get_client_residence');
	 Route::post('postclientresidence', 'OmekDispController\ClientController@postclientresidence');
	 Route::post('postclientgender', 'OmekDispController\ClientController@postclientgender');
	 Route::post('postclientoccupation', 'OmekDispController\ClientController@postclientoccupation');
	 Route::post('postclientregistration', 'OmekDispController\ClientController@postclientregistration');
	 Route::get('getregisteredclient/{facility_id}', 'OmekDispController\ClientController@getregisteredclient');
	 Route::post('getclienttoserve', 'OmekDispController\ClientController@getclienttoserve');
	 Route::post('getitemtoserve', 'OmekDispController\ItemsaleController@getitemtoserve');
	 Route::post('getitemtype', 'OmekDispController\ItemmanageController@getitemtype');
	 
	 Route::get('get_item_types/{facility_id}', 'OmekDispController\ItemmanageController@get_item_types');
	 Route::get('get_item_categories/{facility_id}', 'OmekDispController\ItemmanageController@get_item_categories');
	 Route::get('get_item_departments/{facility_id}', 'OmekDispController\ItemmanageController@get_item_departments');
	 Route::get('get_item_units/{facility_id}', 'OmekDispController\ItemmanageController@get_item_units');
	 //Route::get('get_item_batches/{facility_id}', 'OmekDispController\ItemmanageController@get_item_batches');
	 Route::get('get_item_statuses', 'OmekDispController\ItemmanageController@get_item_statuses');
	 Route::get('get_item_batches', 'OmekDispController\ItemmanageController@get_item_batches');
	 Route::get('get_item_registered/{facility_id}', 'OmekDispController\ItemmanageController@get_item_registered');
	 Route::post('saveitem', 'OmekDispController\ItemmanageController@saveitem');
	 Route::post('getitemtoupdates', 'OmekDispController\ItemmanageController@getitemtoupdates');
	 Route::post('getitemtosale', 'OmekDispController\ItemmanageController@getitemtosale');
	 Route::post('save_sale_two', 'OmekDispController\ItemmanageController@save_sale_two');
	 Route::post('getitemsold', 'OmekDispController\ItemmanageController@getitemsold');
	 Route::post('postsalereport', 'OmekDispController\ItemSalesReport@postsalereport');
	 Route::post('detailedsalereport', 'OmekDispController\ItemSalesReport@detailedsalereport');
	 Route::post('updatenewitem', 'OmekDispController\ItemmanageController@updatenewitem');
	 Route::post('itempurchasereport', 'OmekDispController\ItemSalesReport@itempurchasereport');
	 Route::post('getsolditemreport', 'OmekDispController\ItemSalesReport@getsolditemreport');

	 //report APIs
	 Route::post('getcliregistrationnreport','OmekReportController\ClientRegistrationController@cliregistrationnreport');

	//Download Links
	//Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
	Route::get('downloadExcel', 'OmekReportController\ClientRegistrationController@downloadExcel');
	Route::get('downloadExcel/{type}', 'OmekReportController\ClientRegistrationController@downloadExcel'); 
	Route::get('pdfview',array('as'=>'pdfview','uses'=>'OmekReportController\ClientRegistrationController@pdfview')); 
	 
    //routes for editing user
    // Route::post('update_user', 'AuthenticateController@update_user');
    // Route::post('register', 'AuthenticateController@register');
    // Route::get('delete/{id}', 'AuthenticateController@delete');
    // Route::get('edit/{id}', 'AuthenticateController@edit');
	
	//regions routes @ AME O. KISANGA
    // Route::resource('region_registration', 'Region\RegionsController');
    // Route::get('delete/{id}', 'Region\RegionsController@delete');
    // Route::post('update_region', 'Region\RegionsController@update_region');
		
	//proffesionals routes @ AME O. KISANGA
	// Route::resource('professional_registration', 'Professional\ProfessionalController');
	// Route::post('update_professional', 'Professional\ProfessionalController@update_professional');
	// Route::get('deleteprof/{id}', 'Professional\ProfessionalController@deleteprof');
	
	//Country zone routes @ AME O. KISANGA
	// Route::resource('country_zone_registration', 'Country\CountryController');
	// Route::post('country_zone_registration', 'Country\CountryController@country_zone_registration');
	// Route::get('getcountry_zone', 'Country\CountryController@getcountry_zone');
	// Route::post('update_country_zone', 'Country\CountryController@update_country_zone');
	// Route::get('deletecountryzone/{id}', 'Country\CountryController@deletecountryzone');
	
	//Country Registration routes @ AME O. KISANGA
	// Route::resource('country_name_registration', 'Country\CountryController');
	// Route::post('country_name_registration', 'Country\CountryController@country_name_registration');
	// Route::get('getcountries', 'Country\CountryController@getcountries');
	// Route::post('update_country_name', 'Country\CountryController@update_country_name');
	// Route::get('deletecountry/{id}', 'Country\CountryController@deletecountry');
	
	//Tribe Routes @ AME O. KISANGA
	// Route::post('tribe_registration', 'Tribe\TribeController@tribe_registration');
	// Route::get('gettribe_name', 'Tribe\TribeController@gettribe_name');
	// Route::post('updatetribe', 'Tribe\TribeController@updatetribe');
	// Route::get('deletetribe/{id}', 'Tribe\TribeController@deletetribe');
	
	// Occupation Routes @ AME O. KISANGA
	// Route::post('occupation_registration', 'Occupation\OccupationController@occupation_registration');
	// Route::get('getoccupation', 'Occupation\OccupationController@getoccupation');
	// Route::post('updateoccupation', 'Occupation\OccupationController@updateoccupation');
	// Route::get('deleteoccupation/{id}', 'Occupation\OccupationController@deleteoccupation');
	
	// Marital Routes @ AME O. KISANGA
	// Route::post('marital_registration', 'Marital\MaritalController@marital_registration');
	// Route::get('getmarital_status', 'Marital\MaritalController@getmarital_status');
	// Route::post('updatemaritalstatus', 'Marital\MaritalController@updatemaritalstatus');
	// Route::get('deletemaritalstatus/{id}', 'Marital\MaritalController@deletemaritalstatus');
	
	//residence routes @ AME O. KISANGA
    // Route::post('residence_registration', 'Residence\ResidenceController@residence_registration');
    // Route::get('residence_list', 'Residence\ResidenceController@residence_list');
    // Route::get('residence_delete/{id}', 'Residence\ResidenceController@residence_delete');
    // Route::post('residence_update', 'Residence\ResidenceController@residence_update');
	
	//facilities routes @ AME O. KISANGA
    // Route::post('facility_registration', 'Facility\FacilityController@facility_registration');
    // Route::get('facility_list', 'Facility\FacilityController@facility_list');
    // Route::get('facility_delete/{id}', 'Facility\FacilityController@facility_delete');
    // Route::post('facility_update', 'Facility\FacilityController@facility_update');
	
	//facility types routes @ AME O. KISANGA
    // Route::post('facility_type_registration', 'Facility\FacilityController@facility_type_registration');
    // Route::get('facility_type_list', 'Facility\FacilityController@facility_type_list');
    // Route::get('facility_type_delete/{id}', 'Facility\FacilityController@facility_type_delete');
    // Route::post('facility_type_update', 'Facility\FacilityController@facility_type_update');
	
	//councils routes @ AME O. KISANGA
    // Route::post('council_registration', 'Region\RegionsController@council_registration');
    // Route::get('council_list', 'Region\RegionsController@council_list');
    // Route::get('council_delete/{id}', 'Region\RegionsController@council_delete');
    // Route::post('council_update', 'Region\RegionsController@council_update');
	
	//council_type_registration routes @ AME O. KISANGA
    // Route::post('council_type_registration', 'Region\RegionsController@council_type_registration');
    // Route::get('council_type_list', 'Region\RegionsController@council_type_list');
    // Route::get('council_type_delete/{id}', 'Region\RegionsController@council_type_delete');
    // Route::post('council_type_update', 'Region\RegionsController@council_type_update');
	
	///users routes
    // Route::post('user_registration', 'User\UsersRegistrationController@user_registration');
    // Route::post('alluser_registration', 'User\UsersRegistrationController@alluser_registration');
    // 
    // Route::get('user_delete/{id}', 'User\UsersRegistrationController@user_delete');
    // Route::post('user_update', 'User\UsersRegistrationController@user_update');
		
	//PATIENT REGISTRATION   @ AME O. KISANGA
	// Route::get('getMaritalStatus/{id}','registration\PatientController@getMaritalStatus');
	// Route::get('getTribe/{id}','registration\PatientController@getTribe');
	// Route::get('getOccupation/{id}','registration\PatientController@getOccupation');
	// Route::get('getCountry/{id}','registration\PatientController@getCountry');
	// Route::get('getRelationships/{id}','registration\PatientController@getRelationships');

	//council_type_registration routes @ AME O. KISANGA
    // Route::post('council_type_registration', 'Region\RegionsController@council_type_registration');
    // Route::get('council_type_list', 'Region\RegionsController@council_type_list');
    // Route::get('council_type_delete/{id}', 'Region\RegionsController@council_type_delete');
    // Route::post('council_type_update', 'Region\RegionsController@council_type_update');


	//councils routes @ AME O. KISANGA
    // Route::post('council_registration', 'Region\RegionsController@council_registration');
    // Route::get('council_list', 'Region\RegionsController@council_list');
    // Route::get('council_delete/{id}', 'Region\RegionsController@council_delete');
    // Route::post('council_update', 'Region\RegionsController@council_update');

	//facility types routes @ AME O. KISANGA
    // Route::post('facility_type_registration', 'Facility\FacilityController@facility_type_registration');
    // Route::get('facility_type_list', 'Facility\FacilityController@facility_type_list');
    // Route::get('facility_type_delete/{id}', 'Facility\FacilityController@facility_type_delete');
    // Route::post('facility_type_update', 'Facility\FacilityController@facility_type_update');

    ///facilities routes @ AME O. KISANGA
    // Route::post('facility_registration', 'Facility\FacilityController@facility_registration');
    // Route::get('facility_list', 'Facility\FacilityController@facility_list');
    // Route::get('facility_delete/{id}', 'Facility\FacilityController@facility_delete');
    // Route::post('facility_update', 'Facility\FacilityController@facility_update');


    ///users routes @ AME O. KISANGA
    // Route::post('user_registration', 'User\UsersRegistrationController@user_registration');
    // Route::get('user_list', 'User\UsersRegistrationController@user_list');
    // Route::get('user_delete/{id}', 'User\UsersRegistrationController@user_delete');
    // Route::post('user_update', 'User\UsersRegistrationController@user_update');
    // Route::post('check_password', 'User\UsersRegistrationController@check_password');
    // Route::post('reset_password', 'User\UsersRegistrationController@reset_password');


    // residence routes @ AME O. KISANGA
    // Route::post('residence_registration', 'Residence\ResidenceController@residence_registration');
    // Route::get('residence_list', 'Residence\ResidenceController@residence_list');
    // Route::get('residence_delete/{id}', 'Residence\ResidenceController@residence_delete');
    // Route::post('residence_update', 'Residence\ResidenceController@residence_update');

    //departments routes @ AME O. KISANGA
    // Route::post('department_registration', 'Facility\DepartmentController@department_registration');
    // Route::get('department_list', 'Facility\DepartmentController@department_list');
    // Route::get('department_delete/{id}', 'Facility\DepartmentController@department_delete');
    // Route::post('department_update', 'Facility\DepartmentController@department_update');
	
	
    //DUKANI ROUTES @ AME O. KISANGA
    //Route::get('get_item_type/{facility_id}', 'Dukani\ItemController@get_item_type');
    // Route::get('get_department/{facility_id}', 'Dukani\ItemController@get_department');
    //Route::get('get_unit/{facility_id}', 'Dukani\ItemController@get_unit');
    //Route::get('get_batch/{facility_id}', 'Dukani\ItemController@get_batch');
    //Route::get('get_status', 'Dukani\ItemController@get_status');
    //Route::post('getupdateitemtosale', 'Dukani\ItemController@getupdateitemtosale');
    //Route::post('updateitemtosale', 'Dukani\ItemController@updateitemtosale');
    //Route::post('testss', 'Dukani\ItemController@testss');
    //Route::post('postupdateitem', 'Dukani\ItemController@postupdateitem');
    
    //Route::post('saveitem', 'Dukani\ItemController@saveitem');
    //Route::post('getitemregistered', 'Dukani\ItemController@getitemregistered');
    //Route::post('getnewitemregistered', 'Dukani\ItemController@getnewitemregistered');
    //Route::post('getitemtosale', 'Dukani\ItemController@getitemtosale');
    //Route::post('save_sale', 'Dukani\ItemController@save_sale');
    //Route::post('save_sale_two', 'Dukani\ItemController@save_sale_two');
	//Route::post('getsales_reports', 'Dukani\ReportController@getsales_reports');
	//Route::post('getitemreport', 'Dukani\ReportController@getitemreport');
    //Route::post('getemployeesales', 'Dukani\ReportController@getemployeesales');
    //Route::post('getemployee_sales', 'Dukani\ReportController@getemployee_sales');
	//Route::post('getitemsold', 'Dukani\ItemController@getitemsold');
	//Route::post('getfacility', 'Facility\FacilityController@getfacility');
	//Route::post('getallfacility', 'Facility\FacilityController@getallfacility');
	//Route::post('get_facilities', 'Facility\FacilityController@get_facilities');
	//Route::post('getfacilityuser', 'Facility\FacilityController@getfacilityuser');
	//Route::post('getallfacilityuser', 'Facility\FacilityController@getallfacilityuser');
	//Route::post('updatefacility', 'Facility\FacilityController@updatefacility');
	//Route::get('getoutofstock/{facility_id}', 'Dukani\ReportController@getoutofstock');
	//Route::get('facility_types', 'Facility\FacilityController@facility_types');
	//Route::get('facility_council', 'Facility\FacilityController@facility_council');
	//Route::get('facility_region', 'Facility\FacilityController@facility_region');
	//Route::post('facility_registration', 'Facility\FacilityController@facility_registration');
	//Route::post('getoutofstock', 'Dukani\ReportController@getoutofstock');
	
	//TRANSACTION ROUTES
    // Route::get('get_tcompanie', 'Dukani\tController@get_tcompanie');
	// Route::post('save_company_initial_balance', 'Dukani\tController@save_company_initial_balance');
	// Route::post('getbalancetransaction', 'Dukani\tController@getbalancetransaction');
	// Route::post('getbalancetransactiontouse', 'Dukani\tController@getbalancetransactiontouse');
	// Route::post('get_floatbalance', 'Dukani\tController@get_floatbalance');
	// Route::post('tran_transaction_save', 'Dukani\tController@tran_transaction_save');
    // Route::get('get_batches', 'Dukani\ReportController@get_batches');
    // Route::post('getfacilitybatchreport', 'Dukani\ReportController@getfacilitybatchreport');

	//Export & Import
	

});