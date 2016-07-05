var app = angular.module('detallecompraApp', ['directivas']);
app.controller('detallecompraController', function($scope, $http) {
$scope.detco_cantidad = null;
$scope.detco_precio = null;
$scope.detco_tipocambio = null;
$scope.Compras_comp_compraid = null;
$scope.Producto_prod_productoid = null;
$scope.Producto_SubCategoria_subc_subcategoriaid = null;
$scope.detco_detallecompraid = null;
$scope.detallecompra = [];
$http.post("../../DataAccess/Servicios/detallecompra/ServiceSelectAlldetallecompra.php")
.success(function(data) {
$scope.detallecompra = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.detco_detallecompraid ==null)
{
var parametros = {
detco_cantidad: $scope.detco_cantidad
,
detco_precio: $scope.detco_precio
,
detco_tipocambio: $scope.detco_tipocambio
,
Compras_comp_compraid: $scope.Compras_comp_compraid
,
Producto_prod_productoid: $scope.Producto_prod_productoid
,
Producto_SubCategoria_subc_subcategoriaid: $scope.Producto_SubCategoria_subc_subcategoriaid
,
detco_detallecompraid: $scope.detco_detallecompraid
}
$http.post("../../DataAccess/Servicios/detallecompra/ServiceInsertdetallecompra.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.detco_cantidad =null;
$scope.detco_precio =null;
$scope.detco_tipocambio =null;
$scope.Compras_comp_compraid =null;
$scope.Producto_prod_productoid =null;
$scope.Producto_SubCategoria_subc_subcategoriaid =null;
$scope.detco_detallecompraid =null;
$http.post("../../DataAccess/Servicios/detallecompra/ServiceSelectAlldetallecompra.php")
.success(function (data)
{
$scope.detallecompra = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
detco_cantidad: $scope.detco_cantidad
,
detco_precio: $scope.detco_precio
,
detco_tipocambio: $scope.detco_tipocambio
,
Compras_comp_compraid: $scope.Compras_comp_compraid
,
Producto_prod_productoid: $scope.Producto_prod_productoid
,
Producto_SubCategoria_subc_subcategoriaid: $scope.Producto_SubCategoria_subc_subcategoriaid
,
detco_detallecompraid: $scope.detco_detallecompraid
}
$http.post("../../DataAccess/Servicios/detallecompra/ServiceUpdatedetallecompra.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.detco_cantidad =null;
$scope.detco_precio =null;
$scope.detco_tipocambio =null;
$scope.Compras_comp_compraid =null;
$scope.Producto_prod_productoid =null;
$scope.Producto_SubCategoria_subc_subcategoriaid =null;
$scope.detco_detallecompraid =null;
$http.post("../../DataAccess/Servicios/detallecompra/ServiceSelectAlldetallecompra.php")
.success(function (data)
{
$scope.detallecompra = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.detco_cantidad = data.detco_cantidad;
$scope.detco_precio = data.detco_precio;
$scope.detco_tipocambio = data.detco_tipocambio;
$scope.Compras_comp_compraid = data.Compras_comp_compraid;
$scope.Producto_prod_productoid = data.Producto_prod_productoid;
$scope.Producto_SubCategoria_subc_subcategoriaid = data.Producto_SubCategoria_subc_subcategoriaid;
$scope.detco_detallecompraid = data.detco_detallecompraid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
detco_detallecompraid: data.detco_detallecompraid
}
$http.post("../../DataAccess/Servicios/detallecompra/ServiceDeletedetallecompra.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/detallecompra/ServiceSelectAlldetallecompra.php")
.success(function (data)
{
$scope.detallecompra = data;
})
.error(function (error)
{
})

}
});
