// /**
 // * Created by Ame on 4/4/2017.
 // */
// (function() {

        // 'use strict';

        // angular
        // .module('authApp')
        // .controller('ItemController', ItemController);

        // function ItemController($http, $auth, $rootScope,$state,$scope,$uibModal) {
        // var user_id=$scope.currentUser.id;
        // var facility_id=$scope.currentUser.facility_id;

        // //Get Menus
        // var user_id=$rootScope.currentUser.id;
        // var state_name=$state.current.name;
        // $http.get('public/api/getUsermenu/'+user_id ).then(function(data) {
            // $scope.menu=data.data;
        // //console.log($scope.menu);
        // });

        // $scope.setTab = function(newTab){
            // $scope.tab = newTab;
        // };
        // $scope.isSet = function(tabNum){
            // return $scope.tab === tabNum;
        // }
        // $scope.oneAtATime=true;

        // //Set Default tab
        // angular.element(document).ready(
            // function(){
                // $scope.setTab(1);
            // });

            // //Get Item Type
            // $scope.get_item_type=function () {
                // $http.get('public/api/get_item_type/'+facility_id).then(function(data) {
                    // //console.log(data.data);
                    // $scope.item_types=data.data;
                // });
            // }

            // //Get Department
            // $scope.get_department=function () {
                // $http.get('public/api/get_department/'+facility_id).then(function(data) {
                    // //console.log(data.data);
                    // $scope.departments=data.data;
                // });
            // }

            // //Get Unit
            // $scope.get_unit=function () {
                // $http.get('public/api/get_unit/'+facility_id).then(function(data) {
                    // //console.log(data.data);
                    // $scope.units=data.data;
                // });
            // }

            // //Get Batch
            // $scope.get_batch=function () {
                // $http.get('public/api/get_batch/'+facility_id).then(function(data) {
                    // //console.log(data.data);
                    // $scope.batches=data.data;
                // });
            // }

            // //Get Status
            // $scope.get_status=function () {
                // $http.get('public/api/get_status').then(function(data) {
                    // //console.log(data.data);
                    // $scope.statuses=data.data;
                // });
            // }

            // //Register Items
            // $scope.saveitem=function (item) {
                // if (angular.isDefined(item.name)==false) {
                    // return sweetAlert("Please Enter Item Name", "", "error");
                // }
                // if (angular.isDefined(item.buyingprice)==false) {
                    // return sweetAlert("Please Enter Buying Price", "", "error");
                // }
                // if (angular.isDefined(item.sellingprice)==false) {
                    // return sweetAlert("Please Enter Selling Price", "", "error");
                // }
                // if (angular.isDefined(item.quantity)==false) {
                    // return sweetAlert("Please Enter Quantity", "", "error");
                // }
                // if (angular.isDefined(item.reorder)==false) {
                    // return sweetAlert("Please Enter Reorder Level", "", "error");
                // }
                // else {
                    // var item = {
                        // 'item_name': item.name, 'item_type': item.item_type.id,
                        // 'department_id': item.department.id, 'units': item.unit.id, 'batch': item.batche.id,
                        // 'status': item.status.id, 'buyingprice': item.buyingprice, 'sellingprice': item.sellingprice,
                        // 'quantity': item.quantity, 'reorder': item.reorder,'user_id':user_id,'facility_id':facility_id
                    // }
                    // //console.log(item);
                    // $http.post('public/api/saveitem',item).then(function (data) {
                        // //console.log(data.data);
                        // var status=data.data.status;
                        // var msg=data.data.msg;
                        // if(status==0){
                            // swal('Oops!!',msg,'error');
                        // }
                        // else{
                            // swal('success',msg,'success');
							// $scope.item="";
                        // }
                    // });
                // }
            // }


            // //Get Item Updated List
            // $scope.getitemregistered=function(){
                // var datatopass={'user_id':user_id,'facility_id':facility_id}
               // // console.log(datatopass);
                // $http.post('public/api/getitemregistered',datatopass).then(function (data) {
                   // // console.log(data.data);
                    // $scope.itemregistered=data.data;
                // });
            // }
			
			// //Get Item New Registered List
            // $scope.getnewitemregistered=function(){
                // var datatopassed={'user_id':user_id,'facility_id':facility_id}
               // // console.log(datatopass);
                // $http.post('public/api/getnewitemregistered',datatopassed).then(function (data) {
                   // // console.log(data.data);
                    // $scope.newitemregistered=data.data;
                // });
            // }
			
            // //AUTO LOAD DATA WHEN PAGE LOAD
            // $scope.get_item_type();
            // $scope.get_department();
            // $scope.get_unit();
            // $scope.get_batch();
            // $scope.get_status();

    // }
// })();

