(function () {

'use strict';

var app = angular.module('authApp');

app.controller('itemreceipts',
['$scope','$http','$rootScope','$uibModal', '$uibModalInstance', 'object',
function ($scope,$http,$rootScope,$uibModal,$uibModalInstance,object) {
	
$scope.loadsalesreceipt=object;
console.log(object);
$scope.getTotal = function(){
    var total = 0;
    for(var i = 0; i < $scope.loadsalesreceipt.length; i++){
        var product = $scope.loadsalesreceipt.sale_amount_total[i];
        total += (product.price * product.quantity);
    }
	console.log(product);
    return total;
}

	$scope.receiptprint = function(printreceiptid) {
		console.log('printreceiptid');
		var printContents = document.getElementById('printreceiptid').innerHTML;
		var popupWin = window.open('', '_blank', 'width=300,height=300');
		popupWin.document.open();
		popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="printreceipt.css" /></head><body onload="window.print()"><table class="table table-bordered"><tr><td><td><td><td><td>' +printContents+'</td></td></td></td></td></tr></table></body></html>');
		popupWin.document.close();
		}


// 		console.log($scope.loadsalesreceipt);
// //Get totalsales; 
// $scope.sales_total = function(){
// 	console.log($scope.loadsalesreceipt);
// console.log(loadsalesreceipt[0].selling_price);
// var number = $scope.loadsalesreceipt[1].length;
// console.log(number);
// var totalsale = 0;
// for(var i = 0; i<loadsalesreceipt.length; i++){
// 	console.log(loadsalesreceipt[i].selling_price);
// var totalsales = 2;
// total += (product.price * product.quantity);
// }
// return totalsale;
// console.log(totalsales);
// }


}]);


}());