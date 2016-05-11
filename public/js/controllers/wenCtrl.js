angular.module('wenCtrl',[])
  .controller('wenController',function($scope,$http,Wen){
    $scope.wenData={};
    $scope.commentData = {};
     $scope.loading = true;
     $scope.creating=false;
     $scope.showing=false;
     $scope.creatingC=false;
     $scope.loadComm=true;
     $scope.listShow=true;
     $scope.pagetest=1;
    Wen.get()
      .success(function(data){ 
        $scope.list=data;
        var sum=$scope.list.length;
        $scope.pages=Math.ceil(sum/5);
        
                 
          $scope.wens=data.slice(0,5);
        $scope.pageList=new Array();
        for (var i = 0; i<$scope.pages; i++) {
          $scope.pageList[i]={"id":i,"pa":i+1};
        }
        
        $scope.loading = false;
     });

    $scope.listPage=function(page){
      var pa=page+1;
      
      $scope.loading=true;
     Wen.get()
      .success(function(data){ 
        $scope.list=data;
        var sum=$scope.list.length;
        $scope.pages=Math.ceil(sum/5);
        var a=pa*5; 
         
         
          $scope.wens=data.slice(a-5,a);
        //console.log($scope.wens);
        $scope.loading = false;
     });
    }; 
    
    //Wen.getList(1)
      //.success(function(data){
       
      //  $scope.wens=data;
     //   $scope.loading=false;
   //   });
      $scope.wenList=function(page){
        $scope.loading=true;
        Wen.getList(page)
          .success(function(data){
            $scope.wens=data;
            $scope.loading=false;
          })
      };

            $scope.submitWen = function() {
            $scope.loading = true; // 处理的时候，显示任务加载
            
            Wen.save($scope.wenData)
              .success(function() {
                    // 保存成功后，清空评论框，并重新加载全部评论
                    $scope.wenData = {};
                    $scope.creating=false;                
                     Wen.get()
                       .success(function(data){ 
                          $scope.list=data;
                          var sum=$scope.list.length;
                           $scope.pages=Math.ceil(sum/5);
        
                 
                            $scope.wens=data.slice(0,5);
                            $scope.pageList=new Array();
                            for (var i = 0; i<$scope.pages; i++) {
                              $scope.pageList[i]={"id":i,"pa":i+1};
                            }
        
                            $scope.loading = false;
                            
     });

                })
                .error(function(data) {
                    console.log(data); 
                });
        };


      $scope.deleteWen=function(id){
        $scope.loading = true; 
        Wen.destroy(id)
          .success(function(data){
             Wen.get()
      .success(function(data){ 
        $scope.list=data;
        var sum=$scope.list.length;
        $scope.pages=Math.ceil(sum/5);
        
                 
          $scope.wens=data.slice(0,5);
        $scope.pageList=new Array();
        for (var i = 0; i<$scope.pages; i++) {
          $scope.pageList[i]={"id":i,"pa":i+1};
        }
        
        $scope.loading = false;
     });
          });
      };


     $scope.fabuWen=function(){
      $scope.creating=true;
     } ;

     $scope.showWen=function(id){

      Wen.showWen(id)
        .success(function(data){
          $scope.swen=data;
          $scope.showing=true;
        });
        Wen.getComments(id)
          .success(function(CommData){
            $scope.comments=CommData;
            $scope.loadComm=false;
          });
     };

     $scope.showList=function(){
      $scope.showing=false;
     };




     $scope.createComm=function(){
      $scope.creatingC=true;
     };
     
     $scope.storeComm=function(wen_id){
      $scope.creatingC=false;
      $scope.loadComm=true;
      console.log($scope.commentData);
      Wen.saveComment(wen_id,$scope.commentData)
        .success(function(getData){
          $scope.commentData={};
          Wen.getComments(wen_id)
            .success(function(CommData){
              $scope.comments=CommData;
              $scope.loadComm=false;
            });
        });
     };

     $scope.destroyComm=function(wen_id,id){
      $scope.loadComm=true;
      Wen.destroyComment(id)
        .success(function(data){
          Wen.getComments(wen_id)
            .success(function(CommData){
              $scope.comments=CommData;
              $scope.loadComm=false;
            });

        })
     }

  });