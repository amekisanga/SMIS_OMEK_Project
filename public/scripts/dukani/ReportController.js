// /**
 // * Created by Ame on 4/4/2017.
 // */
// (function() {

        // 'use strict';

        // angular
        // .module('authApp')
        // .controller('ReportController', ReportController);

		// function ReportController($http,$auth,$rootScope,$state,$scope,$uibModal) {
        // var user_id=$scope.currentUser.id;
        // var facility_id=$scope.currentUser.facility_id;
	
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
	
		// //Auto Load Out of Stock Items
		// $http.get('public/api/getoutofstock/'+facility_id).then(function (data) 
		// {
        // //console.log(data.data);
        // $scope.outofstock=data.data;
        // });
		 
		// //Get Out of stock
		// //$scope.getoutof_stock= function()
		// //{
		// //$http.post('public/api/getoutofstock',facility_id).then(function (data) 
		// //{
		// //console.log(data.data);
		// //$scope.outofstock=data.data;
		// //});
		// //}		
		 
		 // //Get Sales Report
		// $scope.getsalesreport= function(selectdate)
		// {
		// var sales_report={};
		// if (angular.isDefined(selectdate)==false) {
		// return sweetAlert("Please Select Both Dates", "", "error");
		// }
		// if (angular.isDefined(selectdate.datefrom)==false) {
		// return sweetAlert("Please Select Date From", "", "error");
		// }
		// if (angular.isDefined(selectdate.dateto)==false) {
		// return sweetAlert("Please Select Date To", "", "error");
		// }
		// else 
		// {
		// //console.log(selectdate);
		// var getsales_report=
		// {
		 // 'datefrom':selectdate.datefrom,
		 // 'dateto':selectdate.dateto,
         // 'user_id':user_id,
		 // 'facility_id':facility_id
		// };
		
		// //console.log(getsales_report);
		// $http.post('public/api/getsales_reports',getsales_report).then(function(data) {
		// $scope.sales_report =data.data;
		// //console.log($scope.sales_report);
        // });
		// }
		// }
		
		// //Search Sales Item
		// var item_tosale=[];
		// $scope.showreport=function (searchData) {
		// var searchreportperitem={'SearchItem':searchData,'user_id':user_id,'facility_id':facility_id};
		// //console.log(searchreportperitem);
		// $http.post('public/api/getitemreport',searchreportperitem).then(function(data) {
		// //console.log(data.data);
		// $scope.item_report =data.data;
		// });
		
		// return $scope.item_report;
		// }
		
		// //Get total sales per employee
		// $scope.calcTotalSales = function(sales_report){
		// var total = 0;
		// for(var i = 0; i < sales_report.length; i++){
        // total = total + sales_report[i].quantity_sold_amount;
        // //total += (product.price * product.quantity);
		// }
		// return total;
		// //console.log(total);
		// }
		
		// //showEmployee
		// //Search Employee
		// var employeesales=[];
		// $scope.showEmployee=function (searchData) {
		// var searchEmployee={'SearchEmploye':searchData,'facility_id':facility_id};
		// //console.log(searchEmployee);
		// $http.post('public/api/getemployeesales',searchEmployee).then(function(data) {
		// employeesales =data.data; 
		// //console.log($scope.employeesales);
		// });
		// return employeesales;
		// }
		
		// //Get Department
		// $scope.get_batch=function () {
			// $http.get('public/api/get_batches').then(function(data) {
			   // // console.log(data.data);
				// $scope.batches=data.data;
			// });
		// }
		
		// $scope.getemployeesales= function(dateselect)
		// {
			// //console.log(dateselect);
			// var employee_sales={};
			// if (angular.isDefined(dateselect)==false) {
			// return sweetAlert("Please Select Both Dates", "", "error");
			// }
			// if (angular.isDefined(dateselect.datefrom)==false) {
			// return sweetAlert("Please Select Date From", "", "error");
			// }
			// if (angular.isDefined(dateselect.dateto)==false) {
			// return sweetAlert("Please Select Date To", "", "error");
			// }
			// if (angular.isDefined(dateselect.id)==false) {
			// return sweetAlert("Please Select Employee", "", "error");
			// }
			// else 
			// {
			// var employeesales=
			// {
			 // 'datefrom':dateselect.datefrom,
			 // 'dateto':dateselect.dateto,
			 // 'user_id':dateselect.id.id,
			 // 'facility_id':facility_id
			// };
			// //console.log(employeesales);
			// $http.post('public/api/getemployee_sales',employeesales).then(function(data) {
			// $scope.employee_sales =data.data;
			// //console.log($scope.employee_sales);
			// });
			// }
		// }

		// //Get total buying price
		// //$scope.total_buyingprice = function(employee_sales){
		// //var totalbuyingprice = 0;
		// //for(var i = 0; i<employee_sales.length; i++){
        // //totalbuyingprice = totalbuyingprice + employee_sales[i].buying_price;
        // //total += (product.price * product.quantity);
		// //}
		// //return totalbuyingprice;
		// //console.log(total);
		// //}
		
		// //Get total sales price
		// //$scope.total_sellingprice = function(employee_sales){
		// //var totalsellingprice = 0;
		// //for(var i = 0; i<employee_sales.length; i++){
        // //totalsellingprice = totalsellingprice + employee_sales[i].selling_price;
        // //total += (product.price * product.quantity);
		// //}
		// //return totalsellingprice;
		// //console.log(total);
		// //}
		
		// //Get total sales per employee
		// $scope.calcEmployee_sales = function(employee_sales){
		// var total = 0;
		// for(var i = 0; i<employee_sales.length; i++){
        // total = total + employee_sales[i].quantity_sold_amount;
        // //total += (product.price * product.quantity);
		// }
		// return total;
		// //console.log(total);
		// }
		
		// //Get total sales profit
		// $scope.total_profit = function(employee_sales){
		// var totalproft = 0;
		// for(var i = 0; i<employee_sales.length; i++){
        // totalproft = totalproft + employee_sales[i].sale_profit;
        // //total += (product.price * product.quantity);
		// }
		// return totalproft;
		// //console.log(total);
		// }
		
		
		// //Get total sales profit
		// $scope.new_total_sale = function(sales_report){
		// var total = 0;
		// for(var i = 0; i < sales_report.length; i++){
        // total = total + sales_report[i].new_total_sold_amount;
        // //total += (product.price * product.quantity);
		// }
		// return total;
		// //console.log(total);
		// }
		
		// //Get total sales profit
		// $scope.new_total_profit = function(sales_report){
		// var total = 0;
		// for(var i = 0; i < sales_report.length; i++){
        // total = total + sales_report[i].new_amount_profit;
        // //total += (product.price * product.quantity);
		// }
		// return total;
		// //console.log(total);
		// }
		// //Get Out of Stock Items
		// //$scope.getout_ofstock=function()
		// //{
		// //}
		// $scope.getbatchreport= function(batchreport)
		// {
			// //console.log(batchreport);
			// var employee_sales={};
			// if (angular.isDefined(batchreport)==false) {
			// return sweetAlert("Please Select Both Dates", "", "error");
			// }
			// if (angular.isDefined(batchreport.datefrom)==false) {
			// return sweetAlert("Please Select Date From", "", "error");
			// }
			// if (angular.isDefined(batchreport.dateto)==false) {
			// return sweetAlert("Please Select Date To", "", "error");
			// }
			// if (angular.isDefined(batchreport.batch.id)==false) {
			// return sweetAlert("Please Select Batch Number", "", "error");
			// }
			// else 
			// {
			// var batchreports=
			// {
			 // 'datefrom':batchreport.datefrom,
			 // 'dateto':batchreport.dateto,
			 // 'batch_no': batchreport.batch.id,
			 // 'selected_item_id': batchreport.item_id.item_id,
			 // 'user_id':user_id,
			 // 'facility_id':facility_id
			// };
			// //console.log(batchreports);
			// $http.post('public/api/getfacilitybatchreport',batchreports).then(function(data) {
			// //console.log(data.data);
			// $scope.report_per_item =data.data;
			// //console.log($scope.report_per_batches);
			// });
			// }
		// }
		
		
			// //Pritn Receipt viewsalereport
		// $scope.viewsalereport = function(sales_report){
			// var arr = [];
			// //console.log(sales_report);
			// for (var i in sales_report)
			// {
				// if (sales_report[i].SELECTED =='Y')
				// {
					// arr.push(sales_report[i]);
				// }
			// }
			// console.log(arr);
			// if(arr ==0){
			// sweetAlert(arr, "", "error");
			// }else{
			// var object = angular.extend({},arr);
			// var modalInstance = $uibModal.open({
			// templateUrl: 'public/views/dukani/report/reportreceipt.html',
			// size: 'lg',
			// animation: true,
			// controller: 'reportreceipt',
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
		
		
		
		
		
		
		
		
		
		// //Auto Load Batch
		// $scope.get_batch();
		
		// }
		
// })();

