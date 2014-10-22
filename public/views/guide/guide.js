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
    $scope.countries = [
        {value: '1', description: 'Argentina'},
        {value: '2', description: 'Perú'}
    ];

    $scope.loadCountries = function() {
        console.log("called");
    };
    $scope.loadProvinces = function() {
    };


}])
    .directive("selectguide", function() {
    return {
        restrict: "A",
        //scope: {},
        templateUrl: 'views/guide/templates/guide-finder.html',
        link: function (scope, element, attrs) {
            scope.type = attrs.selectguide;
        }
    }});
