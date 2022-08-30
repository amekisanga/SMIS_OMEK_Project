<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> OMEK SYSTEM </title>

<script src="public/js/app.js"></script>
<script src="public/js/highchart.js"></script>
<script src="public/js/export.js"></script>
<script src="node_modules/es6-promise/dist/es6-promise.auto.min.js"></script>

<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.css">
<link rel="stylesheet" href="node_modules/angularjs-datetime-picker/angularjs-datetime-picker.css">


<link href="public/css/bootstrap.css" rel="stylesheet">
<!-- <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
<link href="public/css/animate.css" rel="stylesheet">
<link href="public/css/style.css" rel="stylesheet">
<link href="public/css/design.css" rel="stylesheet">
<!-- <link href="public/css/material.css" rel="stylesheet"> -->
<link rel="stylesheet" href="node_modules/angularjs-datetime-picker/angularjs-datetime-picker.css">

</head>
<body ng-app="authApp">
<div class="container" >
<div ui-view ng-app ng-controller="AppController" ng-style="style()"></div>
<script src="public/js/step_forms.js"></script>	
</div>  

<!-- Application Dependencies -->
<script src="node_modules/angular/angular.js"></script>
<script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
<script src="node_modules/satellizer/dist/satellizer.js"></script>
<script src="node_modules/angular-ui-bootstrap/dist/ui-bootstrap.js"></script>
<script src="node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js"></script>
<script src="node_modules/angularjs-datetime-picker/angularjs-datetime-picker.js"></script>
<!--  <script src="node_modules/material.js"></script> -->

<!-- Application Scripts -->
<script src="public/scripts/app.js"></script>
<script src="public/scripts/authController.js"></script>
<script src="public/scripts/admin/rolesController.js"></script>
<script src="public/scripts/admin/userSettingController.js"></script>
<script src="public/scripts/userController.js"></script>
<script src="public/scripts/AppController.js"></script>
<script src="public/scripts/regions/regionController.js"></script>
<script src="public/scripts/facility/FacilityController.js"></script>

<!--OMEK HEALTH FACILITY ROUTES PROJECTS-->
<script src="public/scripts/omekdisp/clientregController.js"></script>
<script src="public/scripts/omekdisp/registrationController.js"></script>
<script src="public/scripts/omekdisp/itemsaleController.js"></script>
<script src="public/scripts/omekdisp/reportController.js"></script>
<script src="public/scripts/omekdisp/itemmanageController.js"></script>
<script src="public/scripts/omekdisp/itemreceipts.js"></script>

<!--ECAG SYSTEM-->

<!--dukani project-->
<!--<script src="public/scripts/dukani/ItemController.js"></script>
<script src="public/scripts/dukani/ItemSalesController.js"></script>
<script src="public/scripts/dukani/ReportController.js"></script>
<script src="public/scripts/dukani/tController.js"></script>
<script src="public/scripts/dukani/itemreceipts.js"></script>
<script src="public/scripts/dukani/reportreceipt.js"></script>-->
<!--<script src="public/scripts/dukani/PrintReceipt.js"></script>-->
</body>
</html>