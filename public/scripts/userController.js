(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('UserController', UserController);

    function UserController($http, $auth, $rootScope,$state,$scope) {

        var vm = this;

        vm.users;
        vm.error;
		
		
		
  

        vm.getUsers = function() {

            //Grab the list of users from the API
            $http.get('public/api/authenticate').then(function(users) {
                vm.users = users.data;

                
            }).then(function(error) {
                vm.error = error;
            });
        }
		

        $http.get('public/api/authenticate').then(function(users) {
			   var user_id=$rootScope.currentUser.id;
			    $scope.printUserMenu(user_id);
			
                $scope.users = users.data[0].name;
                $scope.email = users.data[0].email;
                $scope.id = users.data[0].id;
                var description=$scope.users;
                var email= $scope.email;      
                var id= $scope.id;        
            })

        $scope.update=function (user) {
            var comit=confirm('Are you sure you want to Update'+user.name);
            if(comit) {
                $http.post('public/api/update_user', user).then(function (data) {

                    $scope.good = user.name + " " + 'Successful Updated';
                    $scope.kol = data.status;
                    vm.getUsers();
                })
            }
            else{
                return false;
            }
        }
        $scope.delete=function (name,id) {

            var comit=confirm('Are you sure you want to delete'+"    "+name);
            if(comit){
                $http.get('public/api/delete/'+id).then(function(data) {

                    $scope.deleted=name+" "+'Successful Deleted';
                    $scope.del=data.status;
                    vm.getUsers();
                })
            }
            else {
                return false;
            }
        }
		
		  $scope.printUserMenu=function (user_id) {
                //console.log(angular.isDefined(user_id));
		
            $http.get('public/api/getUsermenu/'+user_id ).then(function(data) {
                  $scope.menu=data.data;
				  
				 // console.log($scope.menu);
            });
           
        }
		
		
        $scope.register=function (user) {

            $http.post('public/api/register',user).then(function(data) {

                $scope.send=data.data.name+" "+'Successful Added in Database';

            })
            $scope.user="";
        }
        $scope.edit=function (id) {
            $http.get('public/api/edit/'+id).then(function(data) {


                $scope.japh=data;
                ;

            })
        }
        // We would normally put the logout method in the same
        // spot as the login method, ideally extracted out into
        // a service. For this simpler example we'll leave it here
        vm.logout = function() {

            $auth.logout().then(function() {

                // Remove the authenticated user from local storage
                localStorage.removeItem('user');

                // Flip authenticated to false so that we no longer
                // show UI elements dependant on the user being logged in
                $rootScope.authenticated = false;

                // Remove the current user info from rootscope
                $rootScope.currentUser = null;
				$state.go('auth');
            });
        }



    }

})();
