var app = angular.module('previewApp', ['ngStorage']);
app.controller('previewController', function($scope, $http, $localStorage,
    $sessionStorage) {
$scope.$storage = $localStorage;


    var parametros = {
        prod_productoid: $scope.$storage.productoid

    }
    $http.post("../DataAccess/Servicios/producto/ServiceProductobyID.php", parametros)
        .success(function(data) {
            $scope.categoria = data;
            $scope.nombre = data.producto[0].prod_nombre;
            $scope.descripcion = data.producto[0].prod_descripcion;
            $scope.precio = data.producto[0].prod_precioestandar;
            $scope.garantia = data.producto[0].prod_garantia;
            $scope.stock = data.producto[0].prod_stock;
            $scope.imagen = data.producto[0].prod_imagen;
            $scope.marca = data.producto[0].marc_nombre;
        })
        .error(function(error) {})




});
