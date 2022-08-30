// /**
 // * Created by Ame on 4/4/2017.
 // */
// (function() {

        // 'use strict';

        // angular
        // .module('authApp')
        // .controller('ItemSalesController', ItemSalesController);

// function ItemSalesController($http,$auth,$rootScope,$state,$scope,$uibModal) {
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
			
		// //Search Sales Item
		// var item_tosale=[];
		// $scope.showItem=function (searchData) {
		// var searchItemtosale={'SearchItem':searchData,'user_id':user_id,'facility_id':facility_id};
		// console.log(searchItemtosale);
		// $http.post('public/api/getitemtosale',searchItemtosale).then(function(data) {
		// item_tosale =data.data;
		// });
		// console.log(item_tosale);
		// return item_tosale;
		// }

		
		// $scope.selecteditemtosale =  [];
		// $scope.selecteditemlist = function(selecteditem){
		// if (angular.isDefined(selecteditem)==false) {
		// return sweetAlert("Please Search for Item to Sale", "", "error");
		// }
		// else {
		// $scope.selecteditemtosale.push({
		// "item_id":selecteditem.item_id,
		// "item_name":selecteditem.item_name,
		// "itemtyp":selecteditem.itemtyp,
		// "unit":selecteditem.unit,
		// "quantity":selecteditem.quantity,
		// "buying_price":selecteditem.buying_price,
		// "selling_price":selecteditem.selling_price
		// });
		// //$scope.Allergycarts.push({"patient_id":$scope.selectedPatient.patient_id,"order_id":1,"concept":item.description,"concept_id":item.id,"encounter_id":$scope.selectedPatient.id,"lab_user_id":$rootScope.currentUser.id,"value_boolean":1,"value_coded":"1","value_numeric":"","value_text":item.description,"category":item.category,"comment":"","facility_code":$rootScope.currentUser.facility_code});
		// console.log(selecteditemtosale);
		// }
		// }
		
		// $scope.discounts = [];
		// $scope.saveitemsold = function(selecteditemtosale){
			// console.log(selecteditemtosale);
			// $scope.discounts=selecteditemtosale;
			// $scope.discount = calcDiscountfromDB($scope.discounts);
		// }
		
        // var calcDiscountfromDB = function()
		// {
            // $scope.TotalDiscountfromDB = 0;
            // for(var i=0; i<$scope.discounts.length;i++){
              // $scope.TotalDiscountfromDB += $scope.discounts[i].amount * $scope.discounts[i].selling_price;
            // }
			// //console.log($scope.TotalDiscountfromDB);
            // return $scope.TotalDiscountfromDB;
        // }
		
		// $scope.salingamount = function(selecteditemtosale){
			// console.log(selecteditemtosale);
			// $scope.salingitem=selecteditemtosale;
			// $scope.baki = bakikiasi($scope.salingitem);
			// $scope.totals = calctotal($scope.salingitem);
		// }

		// var bakikiasi= function(){
		// $scope.kiasikilichobaki =[];
		// $scope.arrayiliyobaki =[];
		// for(var i=0; i<$scope.salingitem.length;i++){
		// $scope.kiasikilichobaki[i] = $scope.salingitem[i].kiasichakuuza * $scope.salingitem[i].selling_price;
		// //console.log($scope.kiasikilichobaki);
		// $scope.arrayiliyobaki=$scope.kiasikilichobaki;
		// //return $scope.kiasikilichobaki[i];
		// //console.log($scope.arrayiliyobaki);
		// }
		// }

		 // //calculation of transactions from all Point Of services
        // var calctotal = function(){
            // var sum = 0;

            // for(var i=0; i<$scope.salingitem.length;i++){
                // sum += ($scope.salingitem[i].kiasichakuuza * $scope.salingitem[i].selling_price);
            // }

            // return sum;

        // }
		  
    // }
// })();

