// /**
 // * Created by USER on 2017-02-25.
 // */
// /**
 // * Created by USER on 2017-02-13.
 // */
// /**
 // * Created by USER on 2017-02-13.
 // */
// (function() {

    // 'use strict';

    // angular
        // .module('authApp')
        // .controller('itemSetupController', itemSetupController);

    // function itemSetupController($http, $auth, $rootScope,$state,$location,$scope,$timeout) {

        // //loading menu
        // var user_id=$rootScope.currentUser.id;
        // $http.get('public/api/getUsermenu/'+user_id ).then(function(data) {
            // $scope.menu=data.data;
            // //console.log($scope.menu);

        // });


          // //item registration CRUD



        // $scope.item_registration=function (item) {
            // //console.log(item);
            // var itemsDAta={'item_name':item.item_name,'dept_id':item.dept_id};

            // $http.post('public/api/item_registration',itemsDAta).then(function(data) {



                // $scope.item_list();
                // var sending=data.data;
                // swal(
                    // 'Feedback..',
                    // sending,
                    // 'success'
                // )

            // });
        // }

// //displaying item when function clicked
        // $scope.item_list=function () {

            // $http.get('public/api/item_list').then(function(data) {
                // $scope.items=data.data;

            // });
        // }
        // $http.get('public/api/item_list').then(function(data) {
            // $scope.items=data.data;

        // });
// //displaying item when browser loading
        // $http.get('public/api/department_list').then(function(data) {
            // $scope.departments=data.data;

        // });

        // //  update


        // $scope.item_update=function (item) {

            // var itemsDAta={'id':item.id,'item_name':item.item_name,'dept_id':item.dept_id};

            // swal({
                // title: 'Are you sure?',
                // text: " ",
                // type: 'warning',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes!',
                // cancelButtonText: 'No, cancel!',
                // confirmButtonClass: 'btn btn-success',
                // cancelButtonClass: 'btn btn-danger',
                // buttonsStyling: false
            // }).then(function () {


                // $http.post('public/api/item_update',itemsDAta).then(function (data) {


                    // $scope.item_list();
                    // var sending=data.data;
                    // swal(
                        // 'Feedback..',
                        // 'Updated....',
                        // 'success'
                    // )
                // })



            // }, function (dismiss) {
                // // dismiss can be 'cancel', 'overlay',
                // // 'close', and 'timer'
                // if (dismiss === 'cancel') {
                    // swal(
                        // 'Cancelled',
                        // ' ',
                        // 'error'
                    // )
                // }
            // })




        // }


// //  delete
        // $scope.item_delete=function (item,id) {

            // swal({
                // title: 'Are you sure?',
                // text: " ",
                // type: 'warning',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes!',
                // cancelButtonText: 'No, cancel!',
                // confirmButtonClass: 'btn btn-success',
                // cancelButtonClass: 'btn btn-danger',
                // buttonsStyling: false
            // }).then(function () {


                // $http.get('public/api/item_delete/'+id).then(function(data) {


                    // $scope.item_list();
                    // var sending=data.data;
                    // swal(
                        // 'Feedback..',
                        // 'Deleted..',
                        // 'info'
                    // )
                // })



            // }, function (dismiss) {
                // // dismiss can be 'cancel', 'overlay',
                // // 'close', and 'timer'
                // if (dismiss === 'cancel') {
                    // swal(
                        // 'Cancelled',
                        // ' ',
                        // 'error'
                    // )
                // }
            // })



        // }



        // //item type mapping registration CRUD



        // $scope.item_type_map_registration=function (item_type_map) {

            // var item_type_mapsDAta={
                // 'item_id':item_type_map.selectedItem.id,'Dose_formulation':item_type_map.Dose_formulation,
                // 'dispensing_unit':item_type_map.dispensing_unit,'item_category':item_type_map.item_category,
                // 'item_code':item_type_map.item_code,'sub_item_category':item_type_map.sub_item_category,
                 // 'unit_of_measure':item_type_map.unit_of_measure,
            // };
            // console.log(item_type_map);
            // $http.post('public/api/item_type_map_registration',item_type_mapsDAta).then(function(data) {



                // $scope.item_type_map_list();
                // var sending=data.data;
                // swal(
                    // 'Feedback..',
                    // sending,
                    // 'success'
                // )

            // });
        // }

// //displaying item_type_map when function clicked
        // $scope.item_type_map_list=function () {

            // $http.get('public/api/item_type_map_list').then(function(data) {
                // $scope.item_type_maps=data.data;

            // });
        // }
        // $http.get('public/api/item_type_map_list').then(function(data) {
            // $scope.item_type_maps=data.data;

        // });
// //displaying item_type_map when browser loading
        // $http.get('public/api/department_list').then(function(data) {
            // $scope.departments=data.data;

        // });

        // //  update


        // $scope.item_type_map_update=function (item_type_map) {

            // var item_type_mapsDAta={'item_type_map_name':item_type_map.item_type_map_name,'dept_id':item_type_map.dept_id};
           // // console.log(item_type_mapsDAta)
            // swal({
                // title: 'Are you sure?',
                // text: " ",
                // type: 'warning',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes!',
                // cancelButtonText: 'No, cancel!',
                // confirmButtonClass: 'btn btn-success',
                // cancelButtonClass: 'btn btn-danger',
                // buttonsStyling: false
            // }).then(function () {


                // $http.post('public/api/item_type_map_update',item_type_mapsDAta).then(function (data) {


                    // $scope.item_type_map_list();
                    // var sending=data.data;
                    // swal(
                        // 'Feedback..',
                        // 'Updated..',
                        // 'success'
                    // )
                // })



            // }, function (dismiss) {
                // // dismiss can be 'cancel', 'overlay',
                // // 'close', and 'timer'
                // if (dismiss === 'cancel') {
                    // swal(
                        // 'Cancelled',
                        // ' ',
                        // 'error'
                    // )
                // }
            // })


        // }


// //  delete
        // $scope.item_type_map_delete=function (item_type_map,id) {

            // swal({
                // title: 'Are you sure?',
                // text: " ",
                // type: 'warning',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes!',
                // cancelButtonText: 'No, cancel!',
                // confirmButtonClass: 'btn btn-success',
                // cancelButtonClass: 'btn btn-danger',
                // buttonsStyling: false
            // }).then(function () {


                // $http.get('public/api/item_type_map_delete/'+id).then(function(data) {


                    // $scope.item_type_map_list();
                    // var sending=data.data;
                    // swal(
                        // 'Feedback..',
                        // 'Deleted...',
                        // 'success'
                    // )
                // })



            // }, function (dismiss) {
                // // dismiss can be 'cancel', 'overlay',
                // // 'close', and 'timer'
                // if (dismiss === 'cancel') {
                    // swal(
                        // 'Cancelled',
                        // ' ',
                        // 'error'
                    // )
                // }
            // })



        // }








    // }

// })();
