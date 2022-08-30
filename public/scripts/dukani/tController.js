// /**
 // * Created by Ame on 4/4/2017.
 // */
// (function() {

        // 'use strict';

        // angular
        // .module('authApp')
        // .controller('tController', tController);

		// function tController($http,$auth,$rootScope,$state,$scope,$uibModal) {
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
		
		// $scope.save_transaction = function(transaction)
		// {			
			// if (angular.isDefined(transaction.tcompany.id)==false) {
			// return sweetAlert("Please Select Company Type", "", "error");
			// }
			// if (angular.isDefined(transaction.transactiontype)==false) {
			// return sweetAlert("Please Select Transaction Type", "", "error");
			// }
			// if (angular.isDefined(transaction.amount)==false) {
			// return sweetAlert("Please Enter Amount", "", "error");
			// }
			// if (angular.isDefined(transaction.number)==false) {
			// return sweetAlert("Please Enter Reference/Kumbukumbu Number", "", "error");
			// }
			// else
			// {
			// console.log(transaction);
			// if (transaction.tcompany.id == 1 && transaction.transactiontype == 1) // Kucheki kama ni kampuni sahihi na muamala sahihi 
			// //either tigo pesa kuweka au kutoa au voda kuweka au kutoa
			// {
			// var compfloatbalance = {'company_id': transaction.transactiontype,'user_id':user_id,'facility_id':facility_id}
			// console.log(compfloatbalance);
			// $http.post('public/api/get_floatbalance',compfloatbalance).then(function (data) {
			// //console.log(data.data);
			// //console.log(data.data[0].company_id);
				// if (data.data[0].company_id == transaction.transactiontype)
				// {
				// var floatbalance = data.data[0].amount - transaction.amount;
				// console.log(floatbalance);
				// var balancetppost = {'company_id': transaction.transactiontype,'user_id':user_id,'facility_id':facility_id,'floatbalance':floatbalance,
				// 'ogfloat':data.data[0].amount,'kutoafloat':transaction.amount}
				// console.log(balancetppost);	
				// $http.post('public/api/tran_transaction_save',balancetppost).then(function (data) {
				// console.log(data.data);
				// //return sweetAlert("Zipo sawa", "", "error");
				// });				
				// }
				
				// else{
				// return sweetAlert("Hazipo sawa", "", "error");
				// }
            // });
				// return sweetAlert("No data", "", "error");
			// }
			// else
			// {
				// console.log(transaction.transactiontype);
			// }
			// }		
		// }
		
		   // //Get Transaction Companies
            // $scope.get_tcompanies=function () {
                // $http.get('public/api/get_tcompanie').then(function(data) {
                    // //console.log(data.data);
                    // $scope.tcompanies=data.data;
                // });
            // }
			
			// //Register Items
            // $scope.save_comp_tra_balance=function (companytransaction) {
                // if (angular.isDefined(companytransaction.amount)==false) {
                    // return sweetAlert("Please Enter Amount", "", "error");
                // }
                // if (angular.isDefined(companytransaction.tcompany.id)==false) {
                    // return sweetAlert("Please Enter Select Company", "", "error");
                // }
                
                // else {
                    // var comp_tra_balance = {
                        // 'company_amount': companytransaction.amount, 'company_id': companytransaction.tcompany.id,'user_id':user_id,'facility_id':facility_id}
                    // //console.log(comp_tra_balance);
					 // $http.post('public/api/save_company_initial_balance',comp_tra_balance).then(function (data) {
                        // //console.log(data.data);
                        // var status=data.data.status;
                        // var msg=data.data.msg;
                        // if(status==0){
                            // swal('Oops!!',msg,'error');
                        // }
                        // else{
                            // swal('success',msg,'success');

                        // }
                    // });
                   // }
            // }
			
			// //gettransactionbalance
			// $scope.gettransactionbalance=function(){
                // var transactionbalance={'user_id':user_id,'facility_id':facility_id}
                // console.log(transactionbalance);
                // $http.post('public/api/getbalancetransaction',transactionbalance).then(function (data) {
                    // console.log(data.data);
                    // $scope.transactionbalances=data.data;
                // });
            // }
			
			// //gettransactionbalance
			// $scope.gettransactionbalancetouse=function(){
                // var transactionbalancetouse={'user_id':user_id,'facility_id':facility_id}
                // console.log(transactionbalancetouse);
                // $http.post('public/api/getbalancetransactiontouse',transactionbalancetouse).then(function (data) {
                    // console.log(data.data);
                    // $scope.transactionbalancesuse=data.data;
                // });
            // }
			
			// //AUTO LOAD DATA WHEN PAGE LOAD
            // $scope.get_tcompanies();
            // $scope.gettransactionbalancetouse();

		// }
		
// })();

