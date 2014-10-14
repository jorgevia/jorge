'use strict';

angular.module('myApp.guideEngine', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/guide', {
        templateUrl: 'views/guide/guide.html',
        controller: 'guideCtrl'
    });
}])

.controller('guideCtrl', ['$scope', function($scope) {
    $scope.title = "Buenos Aires Tango Guide";
    $scope.milongas = [
        {'name': 'Carlos 1'},
        {'name': 'Jorge 2'},
        {'name': 'Carlos 3'},
        {'name': 'Milonga 4'},
        {'name': 'Jorgete 5'},
        {'name': 'Milonga 6'},
        {'name': 'Milonga 7'}
    ];


}]);