		(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('AppController', AppController);
	function AppController($scope, $window) {
    var w = angular.element($window);
    $scope.getHeight = function() {
        return w.height();
    };
    $scope.$watch($scope.getHeight, function(newValue, oldValue) {
        $scope.windowHeight = newValue;
        $scope.style = function() {
            return {
                height: newValue + 'px'
            };
        };
    });

    w.bind('resize', function () {
        $scope.$apply();
    });
}
})();