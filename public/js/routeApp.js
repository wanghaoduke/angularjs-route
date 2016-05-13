angular.module('wenRoute',['ngRoute'])
            .config(['$routeProvider', function($routeProvider){
                $routeProvider
                .when('/',{templateUrl:'js/home.html',
                    controller:'wenHomeController'})
                .when('/createWen',{templateUrl:'js/createWen.html',
                    controller:'wenCreateController'})
                .when('/wen/:wenId',{templateUrl:'js/wen.html',
                    controller:'wenShowController'})
                .when('/wen/:wenId/edit',{templateUrl:'js/wenEdit.html',
                    controller:'wenEditController'})
                .when('/wen/:wenId/createComm',{templateUrl:'js/createComm.html',
                    controller:'commCreateController'})
                .otherwise({redirectTo:'/'});
            }]);