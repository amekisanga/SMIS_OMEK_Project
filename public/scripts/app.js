(function() {

'use strict';

angular
.module('authApp', ['ui.router', 'satellizer','ui.bootstrap','ui.bootstrap.modal','angularjs-datetime-picker'])
.config(function($stateProvider, $urlRouterProvider, $authProvider, $httpProvider, $provide) {

function redirectWhenLoggedOut($q, $injector) {

return {

responseError: function(rejection) {

// Need to use $injector.get to bring in $state or else we get
// a circular dependency error
var $state = $injector.get('$state');


// Instead of checking for a status code of 400 which might be used
// for other reasons in Laravel, we check for the specific rejection
// reasons to tell us if we need to redirect to the login state
var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];

// Loop through each rejection reason and redirect to the login
// state if one is encountered
angular.forEach(rejectionReasons, function(value, key) {

if(rejection.data.error === value) {

// If we get a rejection corresponding to one of the reasons
// in our array, we know we need to authenticate the user so 
// we can remove the current user from local storage
localStorage.removeItem('user');

// Send the user to the auth state so they can login
$state.go('auth');
}
});

return $q.reject(rejection);
}
}
}

// Setup for the $httpInterceptor
$provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);

// Push the new factory onto the $http interceptor array
$httpProvider.interceptors.push('redirectWhenLoggedOut');

// Satellizer configuration that specifies which API
// route the JWT should be retrieved from
$authProvider.loginUrl = '/OMEK/public/api/authenticate';




// Redirect to the auth state if any other states
// are requested other than users
$urlRouterProvider.otherwise('/auth');

$stateProvider
.state('auth', {
url: '/auth',
templateUrl: 'public/views/authView.html',
controller: 'AuthController as auth'
})
.state('dashboard', {
url: '/dashboard',
templateUrl: 'public/views/landing_page.html',
controller: 'UserController as user'
}) 

.state('addPermRole', {
url: '/addPermRole',
templateUrl: 'public/views/addPermRole.html',
controller: 'rolesController as roles'
}) 

.state('addViews', {
url: '/addViews',
templateUrl: 'public/views/addViews.html',
controller: 'rolesController as roles'
}) 

.state('addUserImage', {
url: '/addUserImage',
templateUrl: 'public/views/addUserImage.html',
controller: 'rolesController as roles'
}) 

.state('addPermUser', {
url: '/addPermUser',
templateUrl: 'public/views/addPermUser.html',
controller: 'rolesController as roles'
}) 
.state('addRoles', {
url: '/addRoles',
templateUrl:'public/views/registerSystemRoles.html',
controller: 'rolesController as roles'
})
.state('addModules', {
url: '/addModules',
templateUrl:'public/views/registerSystemPemissions.html',
controller: 'rolesController as roles'
})

//dukani states
/* .state('registeritems', {
url: '/register_item',
templateUrl:'public/views/register_item.html',
controller: 'ItemController as items'
}) */

.state('userRegistration', {
url: '/userRegistration',
templateUrl: 'public/views/userRegistration.html',
controller: 'userSettingController as user'
})

.state('UsersList', {
url: '/UsersList',
templateUrl: 'public/views/UsersList.html',
controller: 'userSettingController as user'
})

.state('password_resset', {
url: '/password_resset',
templateUrl: 'public/views/password_resset.html',
controller: 'userSettingController as user'
})


.state('regions', {
url: '/regions',
templateUrl: 'public/views/Region_master.html',
controller: 'regionController'
}) 

.state('facility', {
url: '/facility',
templateUrl: 'public/views/Facility_registration.html',
controller: 'facilityController'
})

.state('facility_list', {
url: '/facility_list',
templateUrl: 'public/views/Facility_list.html',
controller: 'facilityController'
})

/* .state('itemsales', {
url: '/itemsales',
templateUrl: 'public/views/dukani/item/sales.html',
controller: 'ItemSalesController'
})


.state('itemregister', {
url: '/itemregister',
templateUrl: 'public/views/dukani/item/itemregister.html',
controller: 'ItemController'
})

.state('itemupdate', {
url: '/itemupdate',
templateUrl: 'public/views/dukani/item/itemupdate.html',
controller: 'ItemController'
})

.state('report', {
url: '/report',
templateUrl: 'public/views/dukani/report/report.html',
controller: 'ReportController'
}) */

.state('facilitysetup', {
url: '/facilitysetup',
templateUrl: 'public/views/Facility/facilityset.html',
controller: 'ReportController'
})

/* .state('T Module', {
url: '/T Module',
templateUrl: 'public/views/dukani/tmodule/tmodule.html',
controller: 'tController'
})

.state('T Reports', {
url: '/T Reports',
templateUrl: 'public/views/dukani/tmodule/treports.html',
controller: 'tController'
})

.state('T Setup', {
url: '/T Setup',
templateUrl: 'public/views/dukani/tmodule/tsetup.html',
controller: 'tController'
}) */

.state('facilitymanage', {
url: '/facilitymanage',
templateUrl: 'public/views/Facility/facilitymanage.html',
controller: 'FacilityController'
})

.state('itemsale', {
url: '/itemsale',
templateUrl: 'public/views/omekdisp/itemsale/itemsale.html',
controller: 'itemsaleController'
})

.state('itemmanagement', {
url: '/itemmanagement',
templateUrl: 'public/views/omekdisp/itemmanage/itemmanage.html',
controller: 'itemmanageController'
})

.state('itemupdate', {
url: '/itemupdate',
templateUrl: 'public/views/omekdisp/itemmanage/itemupdate.html',
controller: 'itemmanageController'
})

.state('report', {
url: '/report',
templateUrl: 'public/views/omekdisp/reportone/reportone.html',
controller: 'reportController'
})

.state('reporttwo', {
url: '/reporttwo',
templateUrl: 'public/views/omekdisp/reporttwo/reporttwo.html',
controller: 'reportController'
})

// .state('itemmanage', {
//     url: '/itemmanage',
//     templateUrl: 'public/views/omekdisp/itemmanage/report_item.html',
//     controller: 'itemmanageController'
//     })

.state('clientRegistration', {
url: '/clientRegistration',
templateUrl: 'public/views/omekdisp/clientreg/clientreg.html',
controller: 'clientregController'
});

})

.run(function($rootScope, $state,$location) {

// $stateChangeStart is fired whenever the state changes. We can use some parameters
// such as toState to hook into details about the state as it is changing
$rootScope.$on('$stateChangeStart', function(event, toState) {

// Grab the user from local storage and parse it to an object
var user = JSON.parse(localStorage.getItem('user'));            
if (!user && toState.name != "auth") {
swal({
title: 'You are logout',
html: $('<div>')
.addClass('some-class')
.text('Please login again to create new session'),
animation: false,
customClass: 'animated tada'
});
//event.preventDefault();

// go to the "main" state which in our case is users
$location.path( "/auth" );	
}

// If there is any user data in local storage then the user is quite
// likely authenticated. If their token is expired, or if they are
// otherwise not actually authenticated, they will be redirected to
// the auth state because of the rejected request anyway
if(user) {

// The user's authenticated state gets flipped to
// true so we can now show parts of the UI that rely
// on the user being logged in
$rootScope.authenticated = true;

// Putting the user's data on $rootScope allows
// us to access it anywhere across the app. Here
// we are grabbing what is in local storage
$rootScope.currentUser = user;

// If the user is logged in and we hit the auth route we don't need
// to stay there and can send the user to the main state
if(toState.name === "auth") {

// Preventing the default behavior allows us to use $state.go
// to change states
event.preventDefault();

// go to the "main" state which in our case is users
$state.go('dashboard');
} 

if(toState.name !== "auth" && $rootScope.currentUser.length==0) {

// Preventing the default behavior allows us to use $state.go
// to change states
event.preventDefault();

// go to the "main" state which in our case is users
$state.go('auth');
}  

}
});
});
;
})();