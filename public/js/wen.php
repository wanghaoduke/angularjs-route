

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
