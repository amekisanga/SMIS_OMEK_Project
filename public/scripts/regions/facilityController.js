/**
 * Created by USER on 2017-02-13.
 */
/**
 * Created by USER on 2017-02-13.
 */
(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('facilityController', facilityController);

    function facilityController($http, $auth, $rootScope,$state,$location,$scope,$timeout) {

        //loading menu
        var user_id=$rootScope.currentUser.id;
        $http.get('public/api/getUsermenu/'+user_id ).then(function(data) {
            $scope.menu=data.data;
            //console.log($scope.menu);

        });


        $http.get('public/api/region_registration').then(function(data) {
                $scope.regions=data.data;

            });
        $http.get('public/api/council_type_list').then(function(data) {
            $scope.council_types=data.data;

        });


        $http.get('public/api/council_list').then(function(data) {
            $scope.councils=data.data;

        });
        //facility_type_registration  CRUD

        $http.get('public/api/facility_type_list').then(function(data) {
            $scope.facility_types=data.data;

        });

        $scope.facility_type_registration=function (facility_type) {
            //console.log(facility_type)
            $http.post('public/api/facility_type_registration',facility_type).then(function(data) {
                var sending=data.data;
                swal(
                    'Feedback..',
                    sending,
                    'success'
                )

                $scope.facility_type_list();
                $scope.fading();
            });
        }


        $scope.facility_type_list=function () {

            $http.get('public/api/facility_type_list').then(function(data) {
                $scope.facility_types=data.data;

            });
        }



        //facility update


        $scope.facility_type_update=function (facility_type) {
            swal({
                title: 'Are you sure?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {



                $http.post('public/api/facility_type_update', facility_type).then(function (data) {
                    $scope.facility_type_list();
                    var sending=data.data;
                    swal(
                        'Feedback..',
                        'Updates Success...',
                        'success'
                    )
                })


            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        ' ',
                        'error'
                    )
                }
            })


        }
       
       

//facility delete
        $scope.facility_type_delete=function (facility_type,id) {
            swal({
                title: 'Are you sure?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {



                $http.get('public/api/facility_type_delete/'+id).then(function(data) {


                    $scope.facility_type_list();

                    swal(
                        'Feedback..',
                        'Deleted...',
                        'warning'
                    )
                })

            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        ' ',
                        'error'
                    )
                }
            })


        }


        //facilitys registration CRUD



        $scope.facility_registration=function (facility) {
            //console.log(facility);
            $http.post('public/api/facility_registration',facility).then(function(data) {
                $scope.facility_code="";

                var sending=data.data;
                swal(
                    'Feedback..',
                    sending,
                    'success'
                )
                $scope.facility_list();

$scope.facility.facility_name=="";
            });
        }

//displaying facilities when function clicked
        $scope.facility_list=function () {

            $http.get('public/api/facility_list').then(function(data) {
                $scope.facilities=data.data;

            });
        }

//displaying facilities when browser loading
        $http.get('public/api/facility_list').then(function(data) {
            $scope.facilities=data.data;

        });

        //  update


        $scope.facility_update=function (facility) {
            //console.log(facility)
            swal({
                title: 'Are you sure?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {



                $http.post('public/api/facility_update', facility).then(function (data) {


                    $scope.facility_list();
                    var sending=data.data;
                    swal(
                        'Feedback..',
                        'Updates Success...',
                        'success'
                    )
                })

            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        ' ',
                        'error'
                    )
                }
            })





        }


//  delete
        $scope.facility_delete=function (facility,id) {

            swal({
                title: 'Are you sure?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {


                $http.get('public/api/facility_delete/'+id).then(function(data) {


                    $scope.facility_list();
                    var sending=data.data;
                    swal(
                        'Feedback..',
                        'Item Deleted...',
                        'warning'
                    )
                })

            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        ' ',
                        'error'
                    )
                }
            })





        }




        //department registration CRUD



        $scope.department_registration=function (department) {

            swal({
                title: 'Are you sure?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {


                $http.post('public/api/department_registration',department).then(function(data) {


                    var sending=data.data;
                    swal(
                        'Feedback..',
                        sending,
                        'success'
                    )
                    $scope.department.department_name=="";
                    $scope.department_list();


                });

            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        ' ',
                        'error'
                    )
                }
            })



        }

//displaying department when function clicked
        $scope.department_list=function () {

            $http.get('public/api/department_list').then(function(data) {
                $scope.departments=data.data;

            });
        }

//displaying department when browser loading
        $http.get('public/api/department_list').then(function(data) {
            $scope.departments=data.data;

        });

        //  update


        $scope.department_update=function (department) {
            //console.log(department)

            swal({
                title: 'Are you sure?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {


                $http.post('public/api/department_update', department).then(function (data) {


                    $scope.department_list();
                    var sending=data.data;
                    swal(
                        'Feedback..',
                        'Updates Success...',
                        'success',2000
                    )
                })


            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        ' ',
                        'error'
                    )
                }
            })


        }


//  delete
        $scope.department_delete=function (department,id) {


            swal({
                title: 'Are you sure?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {

                $http.get('public/api/department_delete/'+id).then(function(data) {


                    $scope.department_list();
                    var sending=data.data;
                    swal(
                        'Feedback..',
                        'Item Deleted...',
                        'warning'
                    )
                })

            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        ' ',
                        'error'
                    )
                }
            })







        }







        
    }

})();
