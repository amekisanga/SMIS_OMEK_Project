/**
 * Created by USER on 2017-02-13.
 */
(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('itemsaleController', itemsaleController);

    function itemsaleController($http, $auth, $rootScope, $state, $location, $scope, $uibModal) {
		var user_id=$scope.currentUser.id;
        var facility_id=$scope.currentUser.facility_id;

		 $scope.setTab = function(newTab){
             $scope.tab = newTab;
         };
        $scope.isSet = function(tabNum){
             return $scope.tab === tabNum;
         }
         $scope.oneAtATime=true;
		
		//Search Client
		var client_toserve=[];
		
		$scope.showClient=function (searchData) {
		var searchClient={'SearchedClient':searchData,'facility_id':facility_id};
		//console.log(searchClient);
		$http.post('public/api/getclienttoserve',searchClient).then(function(data) {
		$scope.client_toserve =data.data;
		});
		//console.log($scope.client_toserve);
		return $scope.client_toserve;
		}
		
		//Search Client
		var item_toserve=[];
		
		$scope.showItem=function (searchData) {
		var searchItem={'SearchedItem':searchData,'facility_id':facility_id};
		//onsole.log(searchItem);
		$http.post('public/api/getitemtosale',searchItem).then(function(data) {
		$scope.item_toserve =data.data;
		});
		//console.log($scope.item_toserve);
		return $scope.item_toserve;
		}

		$scope.selecteditemtosalea =  [];
		$scope.selecteditemlist = function(selecteditem){
			console.log(selecteditem);
		if (angular.isDefined(selecteditem)==false) {
		return sweetAlert("Please Search for Item to Sale", "", "error");
		}
		else {
		$scope.selecteditemtosalea.push({
		"item_id":selecteditem.itemtobesoldid,
		"item_name":selecteditem.item_name,
		"itemtyp":selecteditem.item_type,
		"unit":selecteditem.item_units,
		"quantity":selecteditem.item_quantity_bought,
		"buying_price":selecteditem.item_buyingprice_new,
		"user_id":user_id,
		"facility_id":facility_id,
		"batch_id":selecteditem.item_batch,
		"selling_price":selecteditem.item_sellingprice_new,
		"item_department_id":selecteditem.item_department_id,
		"department_name":selecteditem.item_department
		});
					
		}
		//console.log($scope.selecteditemtosalea);
		}

		//$scope.discounts = [];
		$scope.saveitemsold = function(selecteditemtosalea){
		//console.log(selecteditemtosalea);
		if (angular.isDefined(selecteditemtosalea).amount=="") {
			return sweetAlert("Please Enter Quantity to Sale", "", "error");
			}
		
		$scope.salingitem=selecteditemtosalea;
		$scope.totals = calctotal($scope.salingitem);
		//console.log($scope.totals);
		///$scope.discounts=selecteditemtosale;
		//$scope.discount = calcDiscountfromDB($scope.discounts);
		}

		//calculation of transactions from all Point Of services
        var calctotal = function()
		{
		var sum = 0;
		for(var i=0; i<$scope.salingitem.length;i++){
		sum += ($scope.salingitem[i].amount * $scope.salingitem[i].selling_price);
		}
		//console.log(sum);
		return sum;
        }

		$scope.removeitem = function(selecteditemtosales)
		{
		//console.log(selecteditemtosales);
		var index = $scope.selecteditemtosalea.indexOf(selecteditemtosales);
		$scope.selecteditemtosalea.splice(index, 1);     
		}

		$scope.save_sales = function(selecteditemtosalea, selectedclient)
		{
		if (angular.isDefined(selectedclient)==false) {
		return sweetAlert("Please Select Client / Patient", "", "error");
		}else{
			
		console.log(selecteditemtosalea);
		//console.log(selectedclient);
		$scope.salesstosave = [];
		var saved_sale=[];
		console.log(selecteditemtosalea);
		for(var i=0; i<$scope.selecteditemtosalea.length;i++){
		//var savearray = 
		var totalsales = selecteditemtosalea[i].amount * selecteditemtosalea[i].selling_price;
		var totalbuying = selecteditemtosalea[i].amount * selecteditemtosalea[i].buying_price;
		var saleprofit = totalsales - totalbuying;
		
		//console.log(saleprofit);
		
		var totalsales1 = selecteditemtosalea[i].amount * selecteditemtosalea[i].selling_price;
		console.log(totalsales1);

		// var totalbuying1 = selecteditemtosalea[i].amount * selecteditemtosalea[i].buying_price;
		// console.log(totalbuying1);
		// var saleprofit1 = totalsales1 - totalbuying1;
		$scope.salesstosave.push
		({
			"client_id":selectedclient.id,
			"item_id":selecteditemtosalea[i].item_id,
			"item_name":selecteditemtosalea[i].item_name,
			"itemtyp":selecteditemtosalea[i].itemtyp,
			"unit":selecteditemtosalea[i].unit,
			"quantity":selecteditemtosalea[i].quantity,
			"sale_amount":selecteditemtosalea[i].amount,
			"quantity_remain":selecteditemtosalea[i].quantity - selecteditemtosalea[i].amount,
			"buying_price":selecteditemtosalea[i].buying_price,
			"selling_price":selecteditemtosalea[i].selling_price,
			"user_id":selecteditemtosalea[i].user_id,
			"facility_id":selecteditemtosalea[i].facility_id,
			"batch_id":selecteditemtosalea[i].batch_id,
			"sold_item_price":selecteditemtosalea[i].selling_price * selecteditemtosalea[i].amount,			
			//"sale_profit":selecteditemtosale[i].selling_price * selecteditemtosale[i].buying_price,
			"sale_profit":saleprofit,
			"sale_total_amount":totalsales1,
			"item_department_id":selecteditemtosalea[i].item_department_id,
			"department_name":selecteditemtosalea[i].department_name
			//"new_amount_sold":selecteditemtosalea[i].soldamount,
			//"new_amount_profit":saleprofit1,
			//"new_total_sold_amount":selecteditemtosalea[i].soldamount * selecteditemtosalea[i].amount
		});
		}
	
		//var searchItemtosale={'item_name':3};
		console.log($scope.salesstosave);
		//console.log(searchItemtosale);
		$http.post('public/api/save_sale_two',$scope.salesstosave).then(function(data) {
		//saved_sale =data.data.msg;
		//console.log(data.data);
		var status=data.data.status;
		var msg=data.data.msg;
		if(status==1){
		swal('success!!',msg,'success');
		
		$state.reload();
		}
		else{
		swal('Opps',msg,'error');
		}
		
		});
		}
	}

		//Get Item Registered
            $scope.getitemsold=function(){
                var getsoldeditem={'user_id':user_id,'facility_id':facility_id}
                //console.log(getsoldeditem);
                $http.post('public/api/getitemsold',getsoldeditem).then(function (data) {
                    console.log(data.data);
                    $scope.itemsold=data.data;
                });
            }
	
	//Pritn Receipt
		$scope.viewreceipt = function(itemsold){
			var arr = [];
			for (var i in itemsold)
			{
				if (itemsold[i].SELECTED =='Y')
				{
					arr.push(itemsold[i]);
				}
			}
			//console.log(arr);
			if(arr ==0){
			sweetAlert(arr, "", "error");
			}else{
				var object = angular.extend({},arr);
			var modalInstance = $uibModal.open({
			templateUrl: 'public/views/omekdisp/itemsale/itemreceipt.html',
			size: 'lg',
			animation: true,
			controller: 'itemreceipts',
			resolve:{
			object: function () {

			return object;
			}
			}


			});

			//sweetAlert(data.data.data, "", "success"); 
			//enterEncounter='';					
			}
		}

	}
})();
