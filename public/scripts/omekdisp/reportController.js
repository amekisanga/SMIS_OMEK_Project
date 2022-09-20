
/**
 * Created by USER on 2017-02-13.
 */
(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('reportController', reportController);

    function reportController($http, $auth, $rootScope, $state, $location, $scope, $uibModal) {
		var user_id=$scope.currentUser.id;
        var facility_id=$scope.currentUser.facility_id;

        $scope.setTab = function(newTab){
		$scope.tab = newTab;
		};
		$scope.isSet = function(tabNum){
		return $scope.tab === tabNum;
		}
		$scope.oneAtATime=true;

        //Search Client Residence
		$scope.saletwo_report=[];
		$scope.getsalesreport=function (selectedate) {
		var searchsalereport={'datefrom':selectedate.datefrom,'dateto':selectedate.dateto,
		'facility_id':facility_id,'department':selectedate.department};
        console.log(searchsalereport);
		$http.post('public/api/postsalereport',searchsalereport).then(function(data) {
		$scope.saletwo_report =data.data;
		
        console.log($scope.saletwo_report);
		});
		//return $scope.client_residence;
		}

		$scope.getsumofTotal = function(){
			var total = 0;
			for(var i = 0; i < $scope.saletwo_report.length; i++){
				var number = parseInt($scope.saletwo_report[i].sale_total);
				total += number;
			}
			return total;
		}
		
		$scope.getsumofprofit = function(){
			var sumofTotal = 0;
			for(var i = 0; i < $scope.saletwo_report.length; i++){
				var product = parseInt($scope.saletwo_report[i].sale_profit_total);
				sumofTotal += product;
			}
			return sumofTotal;
		}

		$scope.getsumofamount = function(){
			var sumofAmount = 4;
			for(var i = 0; i < $scope.saletwo_report.length; i++){
				var amount = parseInt($scope.saletwo_report[i].sale_amount_totalear);
				sumofAmount += amount;
			}
			return sumofAmount;
		}

		$scope.get_item_department=function () {
			$http.get('public/api/get_item_departments/'+facility_id).then(function(data) {
			 //console.log(data.data);
			 $scope.departments=data.data;
			   });
			}

		//Search Client Residence
		$scope.sale_report=[];
		$scope.detailedsalesreport=function (selectddate) {
		var searchsalereport={'datefrom':selectddate.datefrom,'dateto':selectddate.dateto,
		'facility_id':facility_id,'department':selectddate.department};
        console.log(searchsalereport);
		$http.post('public/api/detailedsalereport',searchsalereport).then(function(data) {
		$scope.sale_report =data.data;
        
		});
        console.log($scope.sale_report);
		//return $scope.client_residence;
		}
		
		$scope.getTotal = function(){
			var totaltwo = 0;
			for(var i = 0; i < $scope.sale_report.length; i++){
				var sumtotal = parseInt($scope.sale_report[i].quantity_sold);
				totaltwo += sumtotal;
			}
			return totaltwo;
		}

		$scope.gettotal2 = function(){
			var totalthree = 0;
			for(var i = 0; i < $scope.sale_report.length; i++){
				var sumtotal = parseInt($scope.sale_report[i].sale_amount_total);
				totalthree += sumtotal;
			}
			return totalthree;
		}

		$scope.gettotal3 = function(){
			var totalfour = 0;
			for(var i = 0; i < $scope.sale_report.length; i++){
				var amounttotal = parseInt($scope.sale_report[i].sale_profit);
				totalfour += amounttotal;
			}
			return totalfour;
			
		}
		
		//Search Client Residence
		$scope.item_purchase_report=[];
		$scope.purchaseditemreport=function (selectdate) {
		var searchsalereport={'datefrom':selectdate.datefrom,'dateto':selectdate.dateto,
		'facility_id':facility_id
		// ,'department':selectdate.department
		};
        console.log(searchsalereport);
		$http.post('public/api/itempurchasereport',searchsalereport).then(function(data) {
		$scope.item_purchase_report =data.data;
        
		});
        console.log($scope.item_purchase_report);
		//return $scope.client_residence;
		}

		
		$scope.sumoftotalitem = function(){
			var totalofitem = 0;
			for(var i = 0; i < $scope.item_purchase_report.length; i++){
				var amounttotal = parseInt($scope.item_purchase_report[i].item_bought_unit_price * $scope.item_purchase_report[i].item_bought);
				totalofitem += amounttotal;
			}
			return totalofitem;
		}

		//Search Client Residence
		$scope.clientregi_report=[];
		$scope.clientregreport=function (cliselectedate) {
		var searchcliregreport={'datefrom':cliselectedate.datefrom,'dateto':cliselectedate.dateto,
		'facility_id':facility_id};
        console.log(searchcliregreport);
		$http.post('public/api/getcliregistrationnreport',searchcliregreport).then(function(data) {
		$scope.clientregi_report =data.data;
		
        console.log($scope.clientregi_report);
		});
		//return $scope.client_residence;
		}

		$scope.excelDownload=function(){
			
			$http.get('public/api/downloadExcel').then(function(data) {
				$scope.download =data.data;
				
				console.log($scope.download);
				});
				//return 2;
		}
	}
})();
