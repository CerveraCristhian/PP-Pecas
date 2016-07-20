var app = angular.module('categoriaApp', ['angular.filter','ng-mfb','ngStorage']   );
app.controller('categoriaController', function($scope, $http,$window,
    $localStorage,
    $sessionStorage) {
$scope.cate_nombre = null;
$scope.cate_Activo = null;
$scope.cate_fechacreacion = null;
$scope.cate_fechamodificacion = null;
$scope.cate_usuariocreacion = null;
$scope.cate_usuariomodificacion = null;
$scope.cate_categoriaid = null;
$scope.categoria = [];
$scope.productoid=null;
$scope.$storage = $localStorage;
 $scope.$storage = $localStorage.$default({
          x: []
        });
$("#load").show();
$http.post("../DataAccess/Servicios/categoria/ServiceCategoriaSubCategoria.php")
.success(function(data) {
$scope.categoria = data;
})
.error(function(error) {})

    $scope.producto = [];
    $http.post("../DataAccess/Servicios/producto/ServiceSelectAllproducto.php")
        .success(function(data) {
            $("#load").hide();
            $scope.producto = data;
        })
        .error(function(error) {})


$scope.OnCategoriaClic = function(data)
{
var parametros = {
Categoria_cate_categoriaid :data.subc_subcategoriaid
}

    $scope.producto = [];

    $http.post("../DataAccess/Servicios/producto/ServiceSelectAllProductobyCategoria.php",parametros)
        .success(function(data) {
            $scope.producto = data;
       
        })
        .error(function(error) {})


}


$scope.AddToCart = function(data){

data.cantidad =1;
$scope.$storage.x.push(data);


}


$scope.OnClickProducto = function(data)
{

$scope.productoid = data.prod_productoid;

 var parametros = {
                idproducto: data.prod_productoid
            }
post("pass.php",parametros);

}

$scope.Estatus = function(){


$window.location.href = '/Git/PP-Pecas/DuckTech/Admin/dailyShop/cart.html';
}

$scope.Compra = function(){

$window.location.href = '/Git/PP-Pecas/DuckTech/Admin/dailyShop/cart.html';
}

    function post(path, params, method) {
        method = method || "post";
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);
        for (var key in params) {
            if (params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);
                form.appendChild(hiddenField);
            }
        }
        document.body.appendChild(form);
        form.submit();
    }

});

