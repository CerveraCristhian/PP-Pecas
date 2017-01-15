var app = angular.module('cartApp', ['ngStorage']);
app.controller('cartController', function($scope, $http, $window,
    $localStorage,
    $sessionStorage) {

    $scope.$storage = $localStorage;
    $scope.$storage = $localStorage.$default({
        x: []
    });

    $scope.productos = $scope.$storage.x;


    $scope.Change = function(data) {

        data.preciocalculado = data.cantidad * data.prod_precioestandar;
        SumarCarrito();
    }
    $scope.total = 0;
    $scope.subtotal = 0;
    SumarCarrito();

    function SumarCarrito() {
        $scope.total = 0;
        $scope.subtotal = 0;
        $scope.productos.forEach(myFunction)
    }

    function myFunction(item, index) {
        if (item.cantidad == undefined) {
            item.cantidad = 1;
        }
        if (item.preciocalculado == undefined) {
            item.preciocalculado = item.prod_precioestandar * item.cantidad;
        }
        $scope.subtotal = $scope.subtotal + item.preciocalculado;
        $scope.total = $scope.subtotal * 1.16;
    }

    $scope.DeleteFromCart = function(index) {
        $scope.productos.splice(index, 1);
        SumarCarrito();
    }

    $scope.RegistrarOdenCompra = function() {

        var parametros = {
            method: 'registerCart',
            orco_usuariowebid: 1,
            orco_total: $scope.total,
            orco_estatus: 1,
            detallesCompra: $scope.productos
        }
        $http.post("../../Admin/Commun/commun.php", parametros)
            .success(function(data) {
                $scope.$storage.x = [];
                $scope.productos = $scope.$storage.x;

            })
            .error(function(error) {
                alert(error);
            })

    }








});
