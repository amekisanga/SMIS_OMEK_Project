(function () {

'use strict';

var app = angular.module('authApp');

app.controller('registrationController',
['$scope','$http','$rootScope','$uibModal', '$uibModalInstance',
function ($scope,$http,$rootScope,$uibModal,$uibModalInstance) {

/* $scope.closeModal = function () {
    //$uibModalInstance.dismiss('clientregmodal');
	//$uibModalInstance.result.catch(function () { uibModalInstance.close(); });
	//this.$uibModalInstance.close(false);
	//this.$uibModalInstance.close(false);
  }; */
  
$scope.closeModal = function(){
      $uibModalInstance.dismiss('cancel');
   }




}]);


}());