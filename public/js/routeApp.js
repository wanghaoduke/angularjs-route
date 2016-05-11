angular.module('wenRoute',['ngRoute'])
            .config(['$routeProvider', function($routeProvider){
                $routeProvider
                .when('/',{templateUrl:'js/home.php'})
                .when('/wen',{templateUrl:'js/wen.php'})
                .otherwise({redirectTo:'/'});
            }]);