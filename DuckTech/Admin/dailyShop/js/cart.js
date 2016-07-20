var app = angular.module('cartApp', ['ngStorage']   );
app.controller('cartController', function($scope, $http,$window,
    $localStorage,
    $sessionStorage) {

$scope.$storage = $localStorage;
 $scope.$storage = $localStorage.$default({
          x: []
        });

$scope.productos = $scope.$storage.x;
  











  

});

