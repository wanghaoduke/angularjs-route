var wenApp=angular.module('wenCtrl',[]);



//文章列表控制器
wenApp.controller('wenHomeController',function($scope,$http,Wen){
  $scope.loading=true; //定义一个值用了判断文章列表是否在加载
  Wen.get()          //获取默认的第一页的数据
    .success(function(data){
      var list=data;
      var sum=list.length;
      $scope.pages=Math.ceil(sum/5);
      $scope.wens=data.slice(0,5);
      $scope.loading=false;
      $scope.pageList=new Array();
      for (var i = 0; i<$scope.pages; i++) {
          $scope.pageList[i]={"id":i,"pa":i+1};
        }
    });
  $scope.listPage=function(page){
    var a=page*5;
    $scope.loading=true;
    Wen.get()
      .success(function(data){
        var list=data;
        var sum=list.length;
        $scope.pages=Math.ceil(sum/5);
        $scope.wens=data.slice(a-5,a);
        console.log($scope.wens);
        $scope.loading=false;
        $scope.pageList=new Array();
        for (var i = 0; i<$scope.pages; i++) {
          $scope.pageList[i]={"id":i,"pa":i+1};
        }
      });
  };
  $scope.deleteWen=function(wenId){
    Wen.destroy(wenId)
      .success(function(){
        Wen.get()          //获取默认的第一页的数据
          .success(function(data){
            var list=data;
            var sum=list.length;
            $scope.pages=Math.ceil(sum/5);
            $scope.wens=data.slice(0,5);
            $scope.loading=false;
            $scope.pageList=new Array();
            for (var i = 0; i<$scope.pages; i++) {
              $scope.pageList[i]={"id":i,"pa":i+1};
            }
        });
      });
  };
});




//文章的创建控制器
wenApp.controller('wenCreateController',function($scope,$http,Wen){
  $scope.wenData={}; //定义wenData是一个对象
  $scope.store=false;
  $scope.submitWen = function(){
    Wen.save($scope.wenData)
      .success(function(){
        $scope.wenData = {};   //清空表内内容
        $scope.store=true;
      })
      .error(function(data){
        console.log(data);
      });
  };
});




//文章显示页面控制器
wenApp.controller('wenShowController',function($scope,$http,$routeParams,Wen){
  $scope.loadWen=true;
  $scope.loadComm=true;
  var wenId=$routeParams.wenId;
  Wen.showWen(wenId)
    .success(function(data){
      $scope.swen=data;
      $scope.loadWen=false;
    });
  Wen.getComments(wenId)
    .success(function(data){
      $scope.comments=data;
      $scope.loadComm=false;
      //console.log($scope.comment);
    });
  $scope.destroyComm=function(commId){
    $scope.loadComm=true;
    Wen.destroyComment(commId)
      .success(function(){
        Wen.getComments(wenId)
          .success(function(data){
            $scope.comments=data;
            $scope.loadComm=false;
          });
      });
  };
});




//文章edit页面控制器
wenApp.controller('wenEditController',function($scope,$http,$routeParams,Wen){
  $scope.change=false;
  var wenId=$routeParams.wenId;
  Wen.showWen(wenId)
    .success(function(data){
      $scope.swen=data;
    });
  $scope.editWen=function(){
    console.log($scope.swen);
    Wen.editWen($scope.swen)
      .success(function(){
        $scope.change=true;
      });
  };    
});




//创建comment页面的控制器
wenApp.controller('commCreateController',function($scope,$http,$routeParams,Wen){
  $scope.createComm=true;
  //$scope.commentData={};
  $scope.wenId=$routeParams.wenId;
  var wenId=$routeParams.wenId;
  $scope.storeComm=function(){
    Wen.saveComment(wenId,$scope.commentData)
      .success(function(){
        $scope.createComm=false;
      });
  };
});


 