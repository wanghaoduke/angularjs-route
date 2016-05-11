<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>基于angular和laravel的单页面</title>
</head>
<body>
   <!--bootstrape 的载入 -->
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.min.css">
     <!-- js的载入 -->
  <script src="http://apps.bdimg.com/libs/angular.js/1.4.6/angular.min.js"></script>
    <!-- angular的载入 -->
    <script src="js/controllers/wenCtrl.js"></script> 
    <script src="js/services/wenService.js"></script> 
    <script src="js/wenApp.js"></script> 



<div ng-app="app" ng-controller="wenController">


  <nav class="navbar navbar-default navbar-static-top">
  <div  class="container-fluid">
  <div class="col-md-2 col-md-offset-2">
  <a class="navbar-brand" href="#">angularjs and laravel</a>
  </div>
  <ul class="nav navbar-nav">
        <li class="active" ><a href="#" ng-click="showList()">文章列表</a></li>
  </ul>
  </div>
  </nav>





<div ng-hide="showing">

  <div class="row">
  <div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default"> 
  <div class="panel-heading"> 
  <p ng-hide="creating" align="center"><button type="button" class="btn btn-info" ng-click="fabuWen()">发布新文章</button></p>
  <div ng-show="creating">
  <form ng-submit="submitWen()">
 
  <div class="form-group text-center">
  <label >标题</label>
  <input type="text" ng-model="wenData.title"  placeholder="填入标题"> 
  </div>
  
  
  <div class="form-group text-center">
  <textarea type="text" rows="5" cols="80" ng-model="wenData.text"  placeholder="填写文章内容"></textarea>
  </div>
  <p align="center"><button type="submit" class="btn btn-info" style="font-size: 18px">发布</button> </p>
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>

 



  <div class="row">
  <div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default">
  <div class="panel-heading text-center">
  文章列表
  </div>
  <div class="panel-body">
  <p class="text-center" ng-show="loading">请等待...</span></p>

  <ul class="list-unstyled" ng-hide="loading">
  <li ng-repeat="wen in wens"><a href="#"ng-click="showWen(wen.id)">{{wen.title}}</a>
  <p><a href="#" ng-click="deleteWen(wen.id)"><button class="btn btn-danger">删除</button></a></p>
  </li>
  </ul>
  </div>
  </div> 

  <div class="panel-footer text-center">

<?php 
  use App\Wen;
  $sum=Wen::count();
  
  $page=1;
  $pages=ceil($sum/5);
  
//最多显示多少个页码
  $_pageNum = 5;
  //当前页面小于1 则为1
  $page = $page<1?1:$page;
  //当前页大于总页数 则为总页数
  $page = $page > $pages ? $pages : $page;
  //页数小当前页 则为当前页
  $pages = $pages < $page ? $page : $pages;

   //计算开始页
  $_start = $page - floor($_pageNum/2);
  $_start = $_start<1 ? 1 : $_start;
  //计算结束页
  $_end = $page + floor($_pageNum/2);
  $_end = $_end>$pages? $pages : $_end;


  //当前显示的页码个数不够最大页码数，在进行左右调整
  $_curPageNum = $_end-$_start+1;
  //左调整
  if($_curPageNum<$_pageNum && $_start>1){  
   $_start = $_start - ($_pageNum-$_curPageNum);
   $_start = $_start<1 ? 1 : $_start;
   
  }
  //右边调整
  if($_curPageNum<$_pageNum && $_end<$pages){ 
   $_end = $_end + ($_pageNum-$_curPageNum);
   $_end = $_end>$pages? $pages : $_end;
  }

  $_pageHtml = '<ul class="pagination">';
  /*if($_start == 1){
   $_pageHtml .= '<li><a title="第一页">«</a></li>';
  }else{
   $_pageHtml .= '<li><a  title="第一页" href="'.$url.'&page=1">«</a></li>';
  }*/

  /*if($page>1){
   $_pageHtml .= '<li><a  title="上一页" href="#">«</a></li>';
  }*/
  for ($i = $_start; $i <= $_end; $i++) {
   
    $_pageHtml .= '<li><a href="#" ng-click="wenList('.$i.')" >'.$i.'</a></li>';
   
  }
  /*if($_end == $pages){
   $_pageHtml .= '<li><a title="最后一页">»</a></li>';
  }else{
   $_pageHtml .= '<li><a  title="最后一页" href="'.$url.'&page='.$pages.'">»</a></li>';
  }*/
  /*if($page<$_end){
   $_pageHtml .= '<li><a  title="下一页" href="">»</a></li>';
  }*/
  $_pageHtml .= '</ul>';
  echo $_pageHtml;
 

?>


  </div>
  </div>
  </div>

 
</div>



<div ng-show="showing">


<div class="row">
  <div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default"> 
  <div class="panel-heading"> 
   <h3 align="center">{{swen.title}}</h3>
   </div>
   <div class="panel-body">
   <p>{{swen.text}}</p>
   </div>
  </div>
  </div>
</div>





<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
<div class="panel-heading">
<p align="center">文章的评论</p>
</div>
<div class="panel-body">
<div ng-show="loadComm"><p align="center">正在更新...</p></div>
<div ng-hide="loadComm">
<dl ng-repeat="comment in comments">
<dt>{{comment.user}}<p align="right"><button class="btn btn-danger" ng-click='destroyComm(swen.id,comment.id)' >删除</button></p></dt>
<dd>{{comment.comm}}</dd><hr>
</dl>
</div>
</div>
<div class="panel-footer">
<p align="center"><button class="btn btn-danger" ng-click="createComm(swen.id)" ng-hide="creatingC">发布新评论</button> </p>
<div ng-show="creatingC">
<form ng-submit="storeComm(swen.id)">
<div class="form-group text-center">
<label>评论人</label>
<input type="text" ng-model="commentData.user" placeholder="用户名">
</div>

<div class="form-group">
  <textarea type="text" rows="5" cols="80" ng-model="commentData.comm" placeholder="评论内容"></textarea>
</div>
<p align="center">  <button class="btn btn-info" type="submit"> 发布评论 </button> </p>
</form>
</div>




</div>
</div>
</div>
</div>




</div>

</body>
</html>