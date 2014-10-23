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

    //This is retrieved by a service
    $scope.countries = [
        {value: '1', description: 'Argentina'},
        {value: '2', description: 'Perú'}
    ];


}])
    .directive("selectGuide", function() {
    return {
        restrict: "E",
        //scope: {},
        templateUrl: 'views/guide/templates/guide-finder.html',
        scope: {
            list: "=", //Acá decimos que list está ligado con el objeto con el nombre de la propiedad
            label: "@",
            type: "@"
        },
        controller: function($scope) {
            //$scope.country = 1;
            $scope.dataChanged = function() {
                console.log("Data cambiada");
                console.log($scope.country);
                //Acá deberíamos llamar a la otra directiva para que se refresque
            };
        },
        link: function (scope, element, attrs) {
            console.log(attrs);
            console.log(scope.list);
            console.log(scope.label);
            console.log(scope.type);
            //Sets default country
        }
}});
