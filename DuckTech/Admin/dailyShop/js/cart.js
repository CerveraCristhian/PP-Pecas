var app = angular.module('cartApp', ['ngStorage']   );
app.controller('cartController', function($scope, $http,$window,
    $localStorage,
    $sessionStorage) {

$scope.$storage = $localStorage;
 $scope.$storage = $localStorage.$default({
          x: []
        });

$scope.productos = $scope.$storage.x;
  

$scope.Change = function(data){

    data.preciocalculado = data.cantidad * data.prod_precioestandar;
    SumarCarrito();
}
$scope.total = 0;
$scope.subtotal =0;
SumarCarrito();
function SumarCarrito()
{

$scope.productos.forEach(myFunction)
}
function myFunction(item, index) {

    if (item.cantidad == undefined)
    {
        item.cantidad =1;
    }
    if(item.preciocalculado == undefined)
    {
        item.preciocalculado = item.prod_precioestandar * item.cantidad;
    }
    $scope.subtotal = $scope.subtotal+ item.preciocalculado; 
     $scope.total = $scope.subtotal * 1.16; 
}

$scope.DeleteFromCart = function(index){
  
    $scope.productos.splice(index, 1);
}






  

});

