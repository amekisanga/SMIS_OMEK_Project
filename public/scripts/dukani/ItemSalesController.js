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
        // $http.get('public/api/getUsermenu/'+user_id ).then(function(data) 
		// {
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
		// //console.log(searchItemtosale);
		// $http.post('public/api/getitemtosale',searchItemtosale).then(function(data) {
		// $scope.item_tosale =data.data;
		// });
		// //console.log(item_tosale);
		// return $scope.item_tosale;
		// }
		

		// //Search Item to Update
		// var item_toupdate=[];
		// $scope.showItemtoupdate=function (searchupdateData) {
		// var searchItemtoupdate={'SearchItemtoupdate':searchupdateData,'user_id':user_id,'facility_id':facility_id};
		// //console.log(searchItemtoupdate);
		// $http.post('public/api/getupdateitemtosale',searchItemtoupdate).then(function(data) {
		// $scope.item_toupdate =data.data;
		// });
		// //console.log(item_toupdate);
		// return $scope.item_toupdate;
		// }
		

		// //receive item to update
		// //var receive_updatesitem = [];
		// $scope.saveitemupdate= function (itemupdate)
		// {			
		// var updateitems={'Item_ID':itemupdate.item_id,'user_id':user_id,'facility_id':facility_id,'Buying_Price':itemupdate.buyingprice
		// ,'Selling_Price':itemupdate.sellingprice,'Quantity':itemupdate.quantity,'Reorder_Level':itemupdate.reorder};
		// //console.log(updateitems);
		
		// $http.post('public/api/postupdateitem',updateitems).then(function(data) {
			// //console.log(data.data)
			// var status = data.data.status;
			// var msg=data.data.msg;
			// if(status==1){
				// swal('success!!' ,msg,'success');
				// $scope.itemupdate="";
			// }else{
				// swal('Opps' ,msg,'error');
			// }
		// });
		// //return $scope.updatesitem;
		// }
		
		// //$scope.selecteditemtosale =  [];
		// //$scope.selecteditemlist = function(selecteditem){
		// //if (angular.isDefined(selecteditem)==false) {
		// //return sweetAlert("Please Search for Item to Sale", "", "error");
		// //}
		// //else {
		// //$scope.selecteditemtosale.push({
		// //"item_id":selecteditem.item_id,
		// //"item_name":selecteditem.item_name,
		// //"itemtyp":selecteditem.itemtyp,
		// //"unit":selecteditem.unit,
		// //"quantity":selecteditem.quantity,
		// //"buying_price":selecteditem.buying_price,
		// //"user_id":user_id,
		// //"facility_id":facility_id,
		// //"batch_id":selecteditem.batch_id,
		// //"selling_price":selecteditem.selling_price
		// //});
		// //$scope.Allergycarts.push({"patient_id":$scope.selectedPatient.patient_id,"order_id":1,"concept":item.description,"concept_id":item.id,"encounter_id":$scope.selectedPatient.id,"lab_user_id":$rootScope.currentUser.id,"value_boolean":1,"value_coded":"1","value_numeric":"","value_text":item.description,"category":item.category,"comment":"","facility_code":$rootScope.currentUser.facility_code});
		// //console.log(selecteditemtosale);
		// //}
		// //selecteditem="";
		// //}
		
		// $scope.selecteditemtosalea =  [];
		// $scope.selecteditemlist = function(selecteditem){
			// //console.log(selecteditem);
		// if (angular.isDefined(selecteditem)==false) {
		// return sweetAlert("Please Search for Item to Sale", "", "error");
		// }
		// else {
		// $scope.selecteditemtosalea.push({
		// "item_id":selecteditem.item_id,
		// "item_name":selecteditem.item_name,
		// "itemtyp":selecteditem.itemtyp,
		// "unit":selecteditem.unit,
		// "quantity":selecteditem.quantity,
		// "buying_price":selecteditem.buying_price,
		// "user_id":user_id,
		// "facility_id":facility_id,
		// "batch_id":selecteditem.batch_id,
		// "selling_price":selecteditem.selling_price
		// });
					
		// }	
		// //console.log(selecteditem);
		// }
		
		
		// $scope.discounts = [];
		// $scope.saveitemsold = function(selecteditemtosalea){
		// //console.log(selecteditemtosalea);
		// $scope.salingitem=selecteditemtosalea;
		// $scope.totals = calctotal($scope.salingitem);
		// //console.log($scope.totals);
			// ///$scope.discounts=selecteditemtosale;
			// //$scope.discount = calcDiscountfromDB($scope.discounts);
		// }
		
		// //calculation of transactions from all Point Of services
        // var calctotal = function()
		// {
		// var sum = 0;
		// for(var i=0; i<$scope.salingitem.length;i++){
		// sum += ($scope.salingitem[i].amount * $scope.salingitem[i].selling_price);
		// }
		// //console.log(sum);
		// return sum;
        // }
		
		// $scope.removeitem = function(selecteditemtosales)
		// {
		// console.log(selecteditemtosales);
		// var index = $scope.selecteditemtosalea.indexOf(selecteditemtosales);
		// $scope.selecteditemtosalea.splice(index, 1);     
		// }
		
		// $scope.save_sales = function(selecteditemtosalea)
		// {
		// console.log(selecteditemtosalea);
		// $scope.salesstosave = [];
		// var saved_sale=[];
		// //console.log(selecteditemtosalea);
		// for(var i=0; i<$scope.selecteditemtosalea.length;i++){
		// //var savearray = 
		// var totalsales = selecteditemtosalea[i].amount * selecteditemtosalea[i].selling_price;
		// var totalbuying = selecteditemtosalea[i].amount * selecteditemtosalea[i].buying_price;
		// var saleprofit = totalsales - totalbuying;
		
		// var totalsales1 = selecteditemtosalea[i].amount * selecteditemtosalea[i].soldamount;
		// var totalbuying1 = selecteditemtosalea[i].amount * selecteditemtosalea[i].buying_price;
		// var saleprofit1 = totalsales1 - totalbuying1;
		
		// //var totaldiscount = 
		// //console.log(saleprofit);
		// console.log(saleprofit1);
		// $scope.salesstosave.push
		// ({
			// "item_id":selecteditemtosalea[i].item_id,
			// "item_name":selecteditemtosalea[i].item_name,
			// "itemtyp":selecteditemtosalea[i].itemtyp,
			// "unit":selecteditemtosalea[i].unit,
			// "quantity":selecteditemtosalea[i].quantity,
			// "sale_amount":selecteditemtosalea[i].amount,
			// "quantity_remain":selecteditemtosalea[i].quantity - selecteditemtosalea[i].amount,
			// "buying_price":selecteditemtosalea[i].buying_price,
			// "selling_price":selecteditemtosalea[i].selling_price,
			// "user_id":selecteditemtosalea[i].user_id,
			// "facility_id":selecteditemtosalea[i].facility_id,
			// "batch_id":selecteditemtosalea[i].batch_id,
			// "sold_item_price":selecteditemtosalea[i].selling_price * selecteditemtosalea[i].amount,			
			// //"sale_profit":selecteditemtosale[i].selling_price * selecteditemtosale[i].buying_price,
			// "sale_profit":saleprofit,
			// "new_amount_sold":selecteditemtosalea[i].soldamount,
			// "new_amount_profit":saleprofit1,
			// "new_total_sold_amount":selecteditemtosalea[i].soldamount * selecteditemtosalea[i].amount
		// });
		// }
		// //var searchItemtosale={'item_name':3};
		// console.log($scope.salesstosave);
		// //console.log(searchItemtosale);
		// $http.post('public/api/save_sale_two',$scope.salesstosave).then(function(data) {
		// //saved_sale =data.data.msg;
		// console.log(data.data);
		// var status=data.data.status;
		// var msg=data.data.msg;
		// if(status==1){
		// swal('success!!',msg,'success');
		// //$scope.selecteditem="";
		// /*$scope.selecteditemtosale="";*/
		 // $scope.selecteditemtosalea="";
		// //$scope.item_tosale="";
		// //$scope.salesstosave=""; 
		// }
		// else{
		// swal('Opps',msg,'error');
		// }
		// });
		// //return saved_sale;
		// }
		
		// //$scope.selecteditem="";
		// //$scope.selecteditemtosale="";
		// //$scope.selecteditemtosalea="";
		// //$scope.item_tosale="";
		// //$scope.salesstosave="";
		
		
        // /*var calcDiscountfromDB = function()
		// {
            // $scope.TotalDiscountfromDB = 0;
            // for(var i=0; i<$scope.discounts.length;i++){
              // $scope.TotalDiscountfromDB += $scope.discounts[i].amount * $scope.discounts[i].selling_price;
            // }
			// //console.log($scope.TotalDiscountfromDB);
            // return $scope.TotalDiscountfromDB;
        // }
		
		// $scope.salingamount = function(selecteditemtosale)
		// {
			// //console.log(selecteditemtosale);
			// $scope.salingitem=selecteditemtosale;
			// console.log($scope.salingitem);
			// //$scope.baki = bakikiasi($scope.salingitem);
			
			// //console.log($scope.totals);
		// }
		  
		// var bakikiasi= function()
		// {
		// $scope.kiasikilichobaki =[];
		// $scope.discountArray =[];
		// $scope.arrayiliyobaki =[];
		// for(var i=0; i<$scope.salingitem.length;i++){
		// $scope.kiasikilichobaki[i] = $scope.salingitem[i].kiasichakuuza * $scope.salingitem[i].selling_price;
		// //console.log($scope.kiasikilichobaki);
		// $scope.arrayiliyobaki=$scope.kiasikilichobaki;
		// //$scope.discountArray.push({'id':salingitem.id});
		// //return $scope.kiasikilichobaki[i];
		// //console.log($scope.arrayiliyobaki);
		// //console.log($scope.discountArray);
		// }
		// }
		// */
		
		 // //Get Item Registered
            // $scope.getitemsold=function(){
                // var getsoldeditem={'user_id':user_id,'facility_id':facility_id}
                // //console.log(getsoldeditem);
                // $http.post('public/api/getitemsold',getsoldeditem).then(function (data) {
                   // // console.log(data.data);
                    // $scope.itemsold=data.data;
                // });
            // }
		
		// //Pritn Receipt
		// $scope.viewreceipt = function(itemsold){
			// var arr = [];
			// for (var i in itemsold)
			// {
				// if (itemsold[i].SELECTED =='Y')
				// {
					// arr.push(itemsold[i]);
				// }
			// }
			// //console.log(arr);
			// if(arr ==0){
			// sweetAlert(arr, "", "error");
			// }else{
				// var object = angular.extend({},arr);
			// var modalInstance = $uibModal.open({
			// templateUrl: 'public/views/dukani/item/itemreceipt.html',
			// size: 'lg',
			// animation: true,
			// controller: 'itemreceipts',
			// resolve:{
			// object: function () {

			// return object;
			// }
			// }


			// });

			// //sweetAlert(data.data.data, "", "success"); 
			// //enterEncounter='';					
			// }
		// }
		
		// $scope.downloadFiles=function(file)
		// {
			// //var getsoldeditems={'user_id':1,'facility_id':2}
            // // console.log(getsoldeditems);
			// ///	$http({
			// //	method: 'GET',
			// //	cache: false,
			// //	url: 'public/api/'+'filedownload',
			// //	responseType:'arraybuffer',
			// //	headers: {
			// //	'Content-Type': 'application/json; charset=utf-8',
			// //	//'fileID': file.id
			// //	}
			// //	data: { test: 'hello' }
			// //})	
		// }
    // }
// })();

