angular.module('wenService',[])
  .factory('Wen',function($http){

    return {
      get:function(){
        return $http.get('api/wens');
      },
      save : function(wenData) {
                return $http({
                    method: 'POST',
                    url: 'api/wens',
                    data: wenData
                });
            },
      destroy:function(id){
        return $http.delete('api/wens/'+id);
      },
      showWen:function(id){
        return $http.get('api/wens/'+id);
      },
      editWen : function(wenData) {
                return $http({
                    method: 'POST',
                    url: 'api/wens/storeNew',
                    data: wenData
                });
            },


      getComments:function(wen_id){
        return $http.get('api/comments/'+wen_id);
      },
      saveComment:function(wen_id,commentData){
        return $http({
          method: 'POST',
          url: 'api/comments/'+wen_id,
          data:commentData
        });
      },
      destroyComment: function(id){
        return $http.delete('api/comments/'+id);
      }

    }
  });