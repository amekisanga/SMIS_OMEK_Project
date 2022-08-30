/**
 * Created by USER on 2017-02-13.
 */
(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('clientregController', clientregController);

    function clientregController($http, $auth, $rootScope, $state, $location, $scope, $uibModal) {
		var user_id=$scope.currentUser.id;
        var facility_id=$scope.currentUser.facility_id;
		//Load Client Registration Form
		var modalInstance = null;
		$scope.loadregistrationform = function(){
			modalInstance = $uibModal.open({
			templateUrl: 'public/views/omekdisp/clientreg/clientregistrationform.html',
			size: 'lg',
			align: 'center',
			animation: true,
			controller: 'registrationController',
			controllerAs: 'registCont',
			backdrop: 'static',
			keyboard: false
			});					 
		}
		
		//Search Client Residence
		var client_residence=[];
		$scope.showResidence=function (searchData) {
		var searchClientResidence={'SearchItem':searchData,'facility_id':facility_id};
		$http.post('public/api/postclientresidence',searchClientResidence).then(function(data) {
		$scope.client_residence =data.data;
		});
		return $scope.client_residence;
		}
		
		//Search Client gender
		var client_gender=[];
		$scope.showGender=function (searchData) {
		var searchClientResidence={'SearchItem':searchData,'facility_id':facility_id};
		$http.post('public/api/postclientgender',searchClientResidence).then(function(data) {
		$scope.client_gender =data.data;
		//console.log(data.data);
		});
		return $scope.client_gender;
		}
		
		//Search Client Occupation
		var client_occupation=[];
		$scope.showOccupation=function (searchData) {
		var searchClientOccupation={'SearchItem':searchData,'facility_id':facility_id};
		$http.post('public/api/postclientoccupation',searchClientOccupation).then(function(data) {
		$scope.client_occupation =data.data;
		});
		return $scope.client_occupation;
		}
		
		//save client registration
		$scope.client_registration=function(client)
		{
		//console.log(client);
		if (!client) {
			 return sweetAlert("Please Fill in the form", "", "error");
			 }
		if (!client.first_name) {
			 return sweetAlert("Please Enter First Name", "", "error");
			 }
		if (!client.middle_name) {
			 return sweetAlert("Please Enter Middle Name", "", "error");
			 }
		if (!client.last_name) {
			return sweetAlert("Please Enter Last Name", "", "error");
			}
		if (!client.age) {
			return sweetAlert("Please Enter Client Age", "", "error");
			}
		if (!client.genders) {
			return sweetAlert("Please Select Client Gender", "", "error");
			}
		if (!client.residences) {
			return sweetAlert("Please Select Client Residence", "", "error");
			}
		if (!client.mobile_number) {
			return sweetAlert("Please Enter Client Mobile Number", "", "error");
			}
		if (!client.occupation) {
			return sweetAlert("Please Select Client Occupation", "", "error");
			}
            else {
		
		var client_to_save = {
			'client_name':client.first_name+" "+client.middle_name+" "+client.last_name,
			'client_age':client.age,'client_mobile':client.mobile_number,
			'client_gender_id':client.genders.id,'client_residence_id':client.residences.id,
			'client_occupation_id':client.occupation.id,'facility_id':facility_id,
			'user_who_registered_client':user_id
		}
		};
		//console.log(client_to_save);
		$http.post('public/api/postclientregistration',client_to_save).then(function(data) {
		$scope.client_data_to_save =data.data;
		//console.log($scope.client_data_to_save);
	    var status=data.data.status;
		var msg=data.data.msg;
		if(status==0){
			swal('Oops!!',msg,'error');
		}
		else{
			swal($scope.client_data_to_save.client_name,'Successfully Registered',msg,'success');
			//$scope.client_registration="";
		} 
		});
		//console.log(client);
		//console.log(client.first_name);
		//console.log(genders);
		//console.log(residences);
		//console.log(occupation);
		}
		
		//Get List of registered client
		$scope.showRegisteredClient=function () {
		$http.get('public/api/getregisteredclient/'+facility_id).then(function(data) {
		$scope.getClientList =data.data;
				
		});
		}
		
		//Search Client
		var client_toserve=[];
		
		$scope.showClient=function (searchData) {
		var searchClient={'SearchedClient':searchData,'facility_id':facility_id};
		console.log(searchClient);
		$http.post('public/api/getclienttoserve',searchClient).then(function(data) {
		$scope.client_toserve =data.data;
		});
		//console.log($scope.client_toserve);
		return $scope.client_toserve;
		}
				
		
		
		
		//Load Registered Client
		$scope.showRegisteredClient();
		
	}
})();
