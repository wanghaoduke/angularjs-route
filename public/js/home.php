

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
  <li ng-repeat="wen in wens"><a href="#/wen"ng-click="showWen(wen.id)">{{wen.title}}</a>
  <p><a href="#/" ng-click="deleteWen(wen.id)"><button class="btn btn-danger">删除</button></a></p>
  </li>
  </ul>
  </div>

  <div class="panel-footer text-center">
  <div ng-show="listShow">
<nav>
  <ul class="pagination">
 
    <li ng-repeat="page in pageList" ><a href="#/" ng-click='listPage(page.id)'>{{page.pa}}</a></li>
  
    
  </ul>
</nav>
</div>
  </div>
  </div> 
  </div>
  </div>



