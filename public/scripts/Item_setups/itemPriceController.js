// /**
 // * Created by USER on 2017-02-25.
 // */
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
        // .controller('itemPriceController', itemPriceController);

    // function itemPriceController($http, $auth, $rootScope,$state,$location,$scope,$timeout) {

        // //loading menu
        // var user_id=$rootScope.currentUser.id;
        // var facility_id=$rootScope.currentUser.facility_id;
        // $http.get('public/api/getUsermenu/'+user_id ).then(function(data) {
            // $scope.menu=data.data;
            // //console.log($scope.menu);

        // });


        // //item_price registration CRUD
// // items list
        // $http.get('public/api/item_list').then(function(data) {
            // $scope.items=data.data;

        // });

        // $http.get('public/api/payment_sub_category_list').then(function(data) {
            // $scope.payment_sub_categories=data.data;

        // });

        // $scope.item_price_registration=function (item_price) {
// var itemID=item_price.selectedItem.id;
// var year1=item_price.startingFinancialYear;
// var year2=item_price.endingFinancialYear;
// var category=item_price.sub_category_id;
// var priced=item_price.price;
            // console.log(itemID);
            // if(itemID==undefined || itemID=="" ){
                // swal(
                    // 'Feedback..',
                   // 'Please Select Item name From a list',
                    // 'error'
                // )

            // }
            // else if (priced==undefined ){
                // swal(
                    // 'Feedback..',
                    // 'Please Fill Price for this Item ',
                    // 'error'
                // )
            // }
            // else if (category==undefined ){
                // swal(
                    // 'Feedback..',
                    // 'Please Choose Category for this item Price ',
                    // 'error'
                // )
            // }
            // else if (year1==undefined || year2==undefined){
                // swal(
                    // 'Feedback..',
                    // 'Please Fill  Range of Financial Year for this item Price ',
                    // 'error'
                // )
            // }


            // else{



            // var item_pricesDAta={'sub_category_id':item_price.sub_category_id,'price':item_price.price,'item_id':item_price.selectedItem.id,'facility_id':facility_id,
                // 'startingFinancialYear':item_price.startingFinancialYear,'endingFinancialYear':item_price.endingFinancialYear};
  // //console.log(item_pricesDAta);
            // $http.post('public/api/item_price_registration',item_pricesDAta).then(function(data) {



                // var sending=data.data;
                // swal(
                    // 'Feedback..',
                    // sending,
                    // 'success'
                // )
                // $scope.item_price_list();
            // });

            // $scope.item_price=null;
             
        // }
        // }


// //displaying item_price when function clicked
        // $scope.item_price_list=function () {

            // $http.get('public/api/item_price_list').then(function(data) {
                // $scope.item_prices=data.data;

            // });
        // }
        // $http.get('public/api/item_price_list').then(function(data) {
            // $scope.item_prices=data.data;

        // });
// //displaying item_price when browser loading
        // $http.get('public/api/department_list').then(function(data) {
            // $scope.departments=data.data;

        // });

        // //  update


        // $scope.item_price_update=function (item_price) {

            // var item_pricesDAta={'id':item_price.id,'price':item_price.price,'facility_id':facility_id,
                // 'startingFinancialYear':item_price.startingFinancialYear,'endingFinancialYear':item_price.endingFinancialYear};
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


                // $http.post('public/api/item_price_update',item_pricesDAta).then(function (data) {


                    // $scope.item_price_list();
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
        // $scope.item_price_delete=function (item_price,id) {
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


                // $http.get('public/api/item_price_delete/'+id).then(function(data) {


                    // $scope.item_price_list();
                    // var sending=data.data;
                    // swal(
                        // 'Feedback..',
                        // 'Deleted',
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


 





    // }

// })();

