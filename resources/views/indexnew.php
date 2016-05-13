<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>基于angular和laravel的单页面</title>
</head>
<body ng-app="app" >
   <!--bootstrape 的载入 -->
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.min.css">
     <!-- angularjs的载入 -->
      <script src="http://apps.bdimg.com/libs/angular.js/1.4.6/angular.min.js"></script>
      <script src="http://apps.bdimg.com/libs/angular-route/1.3.13/angular-route.js"></script>
      <!-- 一些要用的js的导入 -->
    <script src="js/controllers/wenCtrl.js"></script> 
    <script src="js/services/wenService.js"></script> 
    <script src="js/wenApp.js"></script> 
    <script src="js/routeApp.js"></script>

<nav class="navbar navbar-default navbar-static-top">
  <div  class="container-fluid">
  <div class="col-md-2 col-md-offset-2">
  <a class="navbar-brand" href="#/">angularjs and laravel</a>
  </div>
  <ul class="nav navbar-nav">
        <li class="active" ><a href="#/" >文章列表</a></li>
  </ul>
  </div>
  </nav>

<div ng-view></div>

</body>
</html>
