/**
 * Created by USER on 2017-02-13.
 */
(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('itemmanageController', itemmanageController);

    function itemmanageController($http, $auth, $rootScope, $state, $location, $scope, $uibModal) {
		var user_id=$scope.currentUser.id;
        var facility_id=$scope.currentUser.facility_id;
		var status = 1;
		
		$scope.setTab = function(newTab){
            $scope.tab = newTab;
        };
        $scope.isSet = function(tabNum){
            return $scope.tab === tabNum;
        }
        $scope.oneAtATime=true;
			
		$scope.get_item_type=function () {
          $http.get('public/api/get_item_types/'+facility_id).then(function(data) {
           console.log(data.data);
           $scope.item_types=data.data;
             });
          }
		  
		$scope.get_item_category=function () {
          $http.get('public/api/get_item_categories/'+facility_id).then(function(data) {
           //console.log(data.data);
           $scope.categories=data.data;
             });
          }
		  
		$scope.get_item_department=function () {
          $http.get('public/api/get_item_departments/'+facility_id).then(function(data) {
           //console.log(data.data);
           $scope.departments=data.data;
             });
          }
		  
		$scope.get_item_unit=function () {
          $http.get('public/api/get_item_units/'+facility_id).then(function(data) {
           //console.log(data.data);
           $scope.units=data.data;
             });
          }
		  
		$scope.get_item_batch=function () {
          $http.get('public/api/get_item_batches/').then(function(data) {
           //console.log(data.data);
           $scope.batches=data.data;
             });
          }
		  
		$scope.get_item_status=function () {
          $http.get('public/api/get_item_statuses').then(function(data) {
           //console.log(data.data);
           $scope.statuses=data.data;
             });
          } 
		  
		$scope.get_item_batch=function () {
          $http.get('public/api/get_item_batches').then(function(data) {
           //console.log(data.data);
           $scope.batches=data.data;
             });
          }
		
		$scope.saveitem=function (item) {
			console.log(item);

		    if (!item.name) {
			 return sweetAlert("Please Fill Item Name", "", "error");
			 }
			 if (!item.item_type) {
			 return sweetAlert("Please Select Item Type", "", "error");
			 }
			 if (!item.category) {
			 return sweetAlert("Please Select Item Category", "", "error");
			 }
			 if (!item.department) {
			 return sweetAlert("Please Select Item Department", "", "error");
			 }
			 if (!item.unit) {
			 return sweetAlert("Please Select Item Unit", "", "error");
			 }
			 if (!item.batche) {
			 return sweetAlert("Please Select Item Batche", "", "error");
			 }
			 if (!item.status) {
			 return sweetAlert("Please Select Item status", "", "error");
			 }
			 if (!item.buyingprice) {
				return sweetAlert("Please Enter Item Buying Price", "", "error");
			}
			 if (!item.sellingprice) {
			 return sweetAlert("Please Enter Item Selling Price", "", "error");
			 }
			 if (!item.quantity) {
			 return sweetAlert("Please Enter Item Quantity", "", "error");
			 }
			 if (!item.reorder) {
			 return sweetAlert("Please Enter Item Reorder", "", "error");
			 }
			else
			{
				 var items = {
                    'item_name': item.name, 'item_type':item.item_type, 'item_category':item.category,
                    'item_department': item.department, 'item_unit':item.unit, 'item_batche':item.batche,
                    'item_status':status, 'item_buyingprice':item.buyingprice, 
					'item_sellingprice':item.sellingprice,'item_quantity': item.quantity, 
					'item_reorder':item.reorder, 'user_id':user_id, 'user_facility_id':facility_id
				 }
			console.log(items);
			 $http.post('public/api/saveitem',items).then(function (data) {
                       console.log(data.data);
                        var status=data.data.status;
                        var msg=data.data.msg; 
                        if(status==0){
                            swal('Oops!!',msg,'error');
                        }
                        else{
                            swal('success',msg,'success');
							//$scope.item="";
                        }
                    });
			}
          }
		
		
		
		//Search Item Type
		var item_types=[];
		$scope.showItem=function (searchData) {
		var searchItemtosale={'SearchItem':searchData,'status':status,'facility_id':facility_id};
		//console.log(searchItemtosale);
		$http.post('public/api/getitemtype',searchItemtosale).then(function(data) {
		$scope.item_types =data.data;
		});
		//console.log(item_tosale);
		return $scope.item_types;
		}
		
		//Get Item Registered
		$scope.getitemregistered=function () {
          $http.get('public/api/get_item_registered/'+facility_id).then(function(data) {
           //console.log(data.data);
           $scope.item_registered=data.data;
             });
          }
		  
		// $scope.showItemtoUpdate=function (searcheditem) {
		// var searchItem={'SearchedItem':searcheditem,'facility_id':facility_id};
		// console.log(searchItem);
		// $http.post('public/api/getitemtoupdate',searchItem).then(function(data) {
		// $scope.item_toupdate =data.data;
		// });
		// console.log($scope.item_toupdate);
		// return $scope.item_toupdate;
		// }
		$scope.showItemtoUpdates=function (searcheditems) {
			var searchsItem={'SearchedItem':searcheditems,'facility_id':facility_id};
			console.log(searchsItem);
			 $http.post('public/api/getitemtoupdates',searchsItem).then(function(data) {
			 $scope.item_toupdate =data.data;
			 });
			console.log($scope.item_toupdate);
			return $scope.item_toupdate;
			}
		
		
		$scope.update_item=function (itemtobeupdated, updateitem)
		{
			//console.log(updateitem);
			//console.log(itemtobeupdated);
			// if (updateitem.newboughtquantity == 'undefined' || updateitem.newboughtquantity == "")
			// {
			// 	return sweetAlert("Please Enter Item Selling Price", "", "error");
			// }
			// else{
				
			 var updateditems = {
				 	'itemid':itemtobeupdated.itemid,
                    'item_name': itemtobeupdated.item_name,
					'item_type_id': itemtobeupdated.item_type_id,
					'item_category_id': itemtobeupdated.item_category_id,
					'item_department_id': itemtobeupdated.item_department_id,
					'item_unit_id': itemtobeupdated.item_unit_id,
					'item_batche_id': itemtobeupdated.item_batche_id,
					'item_status_id': itemtobeupdated.item_status_id,
					'user_id':user_id,
					'facility_id': itemtobeupdated.facility_id, 
					'item_buyingprice_new': itemtobeupdated.item_buyingprice_new, // to be calculated
					'item_buyingprice_old':itemtobeupdated.item_buyingprice_old,
					'item_sellingprice_new': itemtobeupdated.item_sellingprice_new, // to be calculated
					'item_sellingprice_old': itemtobeupdated.item_sellingprice_old,
					'item_quantity_bought': itemtobeupdated.item_quantity_bought,   // to be calculated
					'new_item_bought': updateitem.newboughtquantity,   // total = new item + available
					'item_quantity_old': itemtobeupdated.item_quantity_old,
					'item_quantity_new': itemtobeupdated.item_quantity_new,
					// 'item_reorder': item_reorder,
					'item_new_buying_price': updateitem.newsbuyingprice,
					'item_new_selling_price': updateitem.newsellingprice,
					'create_at':itemtobeupdated.create_at,
					'facility_id':facility_id
					// 'item_date_bought': item_date_bought, 
				 	}
				
			console.log(updateditems);	
			$http.post('public/api/updatenewitem',updateditems).then(function(data) {
				//$scope.updateitemnew =data.data;
				//console.log($scope.updateitemnew);
				var statuses =data.data.status;
				var msg =data.data.msg;
				 
                        if(statuses ==0){
                            swal('Oops!!',msg,'error');
							$state.reload();
                        }
                        else{
                            swal('success',msg,'success');
							$state.reload();
                        }
				});
				//console.log($scope.updateitemnew);
				
			// }
		}

		
		$scope.equipement_delete=function (itemtobeupdated)
		{
			//console.log(updateitem);
			console.log(itemtobeupdated);
			 var items = {
                    // 'item_name': item.name, 
					//'item_type':newitem,
					'item_reorder':updateitem
					// , 'item_category':item.category,
                    // 'item_department': item.department, 'item_unit':item.unit, 'item_batche':item.batche,
                    // 'item_status':status, 'item_buyingprice':item.buyingprice, 
					// 'item_sellingprice':item.sellingprice,'item_quantity': item.quantity, 
					// 'item_reorder':item.reorder, 'user_id':user_id, 'user_facility_id':facility_id
				 }
			console.log(items);			
		}
		
	}
})();
