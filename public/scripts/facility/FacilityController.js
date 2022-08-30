/**
 * Created by USER on 2017-02-13.
 */
(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('FacilityController', FacilityController);

    function FacilityController($http, $auth, $rootScope,$state,$location,$scope) {
		 var user_id=$scope.currentUser.id;
        var facility_id=$scope.currentUser.facility_id;
		var facility_code='001';

        //Get Menus
        var user_id=$rootScope.currentUser.id;
        var state_name=$state.current.name;
        $http.get('public/api/getUsermenu/'+user_id ).then(function(data) 
		{
        $scope.menu=data.data;
        //// console.log($scope.menu);
        });

        $scope.setTab = function(newTab){
            $scope.tab = newTab;
        };
        $scope.isSet = function(tabNum){
            return $scope.tab === tabNum;
        }
        $scope.oneAtATime=true;

        //Set Default tab
        angular.element(document).ready(
            function(){
                $scope.setTab(1);
            });
				
		//Get facility details
        $scope.get_facility=function () {
           var getfacility={'user_id':user_id,'facility_id':facility_id};
           $http.post('public/api/getfacility',getfacility).then(function(data) {
		   $scope.facilitydetails=data.data;
		   // console.log($scope.facilitydetails);              
            });
        }	
		
		//Get all facility
        $scope.getall_facility=function () {
           var getfacilityall={'user_id':user_id,'facility_id':facility_id};
           $http.post('public/api/getallfacility',getfacilityall).then(function(data) {
		   $scope.getfacility_all=data.data;
		   // console.log($scope.getfacility_all);              
            });
        }	
		
		//Get facility details
        $scope.get_facilities=function () {
           var getfacilities={'user_id':user_id};
		   // console.log(getfacilities); 
           $http.post('public/api/get_facilities',getfacilities).then(function(data) {
		   $scope.getfacilities=data.data;
		   // console.log($scope.getfacilities);              
            });
        }
		
		//Get facility users
        $scope.get_facilityusers=function () {
           var getfacilityuser={'user_id':user_id,'facility_id':facility_id};
		   //// console.log(getfacilityuser);
           $http.post('public/api/getfacilityuser',getfacilityuser).then(function(data) {
		   $scope.facilityuserdetails=data.data;
		   // console.log($scope.facilityuserdetails);              
            });
        }
		
		//Get all facility users
        $scope.get_allfacilityusers=function () {
           var getfacilityalluser={'user_id':user_id,'facility_id':facility_id};
		   //// console.log(getfacilityuser);
           $http.post('public/api/getallfacilityuser',getfacilityalluser).then(function(data) {
		   $scope.facilityalluserdetails=data.data;
		   // console.log($scope.facilityalluserdetails);              
            });
        }
		
		$http.get('public/api/professional_registration').then(function(data) {
            $scope.professsionals=data.data;
           //// console.log($scope.professsionals)

        });
		
		//User ragistration 
		$scope.user_registration=function (user) {
		var registeruser={'name':user.name,'email':user.email,'password':user.password,'mobile_number':user.mobile_number,
		'gender':user.gender,'facility_id':facility_id,'proffesionals_id':user.proffesionals_id};
		// console.log(registeruser);
		$http.post('public/api/user_registration',registeruser).then(function(data) {
		//$scope.user_list();
		$scope.user_list=data.data;
		// console.log($scope.user_list);
		var sending=data.data;
		swal(
		'Feedback..',
		sending,
		'success'
		)
		});
		}	
		
		//All User ragistration 
		$scope.alluser_registration=function (user) {
		var allregisteruser={'name':user.name,'email':user.email,'password':user.password,'mobile_number':user.mobile_number,
		'gender':user.gender,'facility_id':user.facility.userfacility_id,'proffesionals_id':user.proffesionals_id};
		// console.log(allregisteruser);
		$http.post('public/api/alluser_registration',allregisteruser).then(function(data) {
		//$scope.user_list();
		$scope.alluser_list=data.data;
		// console.log($scope.alluser_list);
		var sending=data.data;
		swal(
		'Feedback..',
		sending,
		'success'
		)
		});
		}
		
		//Update Fcility
		$scope.facility_update=function (facilitydetail) {
		var facilityupdate={'userfacility_id':facilitydetail.userfacility_id,'facility_code':facilitydetail.facility_code,'facility_name':facilitydetail.name,
		'facility_type_id':facilitydetail.facility_type_id,'addresss':facilitydetail.addresss,'mobile_number':facilitydetail.number,'email':facilitydetail.emails,
		'council_id':facilitydetail.council_id,'region_id':facilitydetail.region_id};
		// console.log(facilityupdate);
		$http.post('public/api/updatefacility',facilityupdate).then(function(data) {
		//$scope.user_list();
		$scope.user_list=data.data;
		// console.log($scope.user_list);
		var msg=data.data.msg;
		if(status==1){
		swal('Oops!!',msg,'error');
		}
		else{
		swal('success',msg,'success');
		}
		});
		}
		
		//facility registration
		$scope.facility_registration=function (facility)
		{
			if (angular.isDefined(facility.name)==false) {
                    return sweetAlert("Please Enter Facility Name", "", "error");
                }
                if (angular.isDefined(facility.owner)==false) {
                    return sweetAlert("Please Enter facility Owner", "", "error");
                }
                if (angular.isDefined(facility.mobilenumber)==false) {
                    return sweetAlert("Please Enter Mobile Number", "", "error");
                }
                if (angular.isDefined(facility.email)==false) {
                    return sweetAlert("Please Enter Email", "", "error");
                }
                if (angular.isDefined(facility.address)==false) {
                    return sweetAlert("Please Enter Address", "", "error");
                }
                else {
		 var facilityregi={
			 'facility_name':facility.name,'facility_owner':facility.owner,
			 'mobile_number':facility.mobilenumber,'email':facility.email,
			 'address':facility.address,'facility_type_id':facility.facility_type.id,
			 'facility_motto':facility.motto,'council_id':facility.facility_council.id,'region_id':facility.facility_region.id
			 ,'facility_code':facility_code
			 };
		 //console.log(facilityregi);
		  $http.post('public/api/facility_registration',facilityregi).then(function (data) {
                        // console.log(data.data);
                        var status=data.data.status;
                        var msg=data.data.msg;
                        if(status==0){
                            swal('Oops!!',msg,'error');
                        }
                        else{
                            swal('success',msg,'success');

                        }
                    });
				}
		}
		
		 //Get facility_type
            $scope.facility_type=function () {
                $http.get('public/api/facility_types').then(function(data) {
                    // console.log(data.data);
                    $scope.facilitytype=data.data;
                });
            }
			
			//Get facility council
            $scope.facility_council=function () {
                $http.get('public/api/facility_council').then(function(data) {
                    // console.log(data.data);
                    $scope.facilitycouncil=data.data;
                });
            }
			
			//Get facility_region
            $scope.facility_region=function () {
                $http.get('public/api/facility_region').then(function(data) {
                    // console.log(data.data);
                    $scope.facilityregion=data.data;
                });
            }
			
		    //AUTO LOAD DATA WHEN PAGE LOAD
            $scope.facility_type();
			$scope.facility_council();
			$scope.facility_region();
			$scope.getall_facility();
			$scope.get_facilities();
		
    }

})();
