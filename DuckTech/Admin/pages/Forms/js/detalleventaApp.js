var app = angular.module('detalleventaApp', ['directivas']);
app.controller('detalleventaController', function($scope, $http) {
$scope.detve_cantidad = null;
$scope.detve_precio = null;
$scope.detve_tipocambio = null;
$scope.Ventas_vent_ventaid = null;
$scope.Producto_prod_productoid = null;
$scope.Producto_SubCategoria_subc_subcategoriaid = null;
$scope.Calidad_cali_calidadid = null;
$scope.DetalleGarantia_dega_detallegarantiaid = null;
$scope.detve_detalleventaid = null;
$scope.detalleventa = [];
$http.post("../../DataAccess/Servicios/detalleventa/ServiceSelectAlldetalleventa.php")
.success(function(data) {
$scope.detalleventa = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.detve_detalleventaid ==null)
{
var parametros = {
detve_cantidad: $scope.detve_cantidad
,
detve_precio: $scope.detve_precio
,
detve_tipocambio: $scope.detve_tipocambio
,
Ventas_vent_ventaid: $scope.Ventas_vent_ventaid
,
Producto_prod_productoid: $scope.Producto_prod_productoid
,
Producto_SubCategoria_subc_subcategoriaid: $scope.Producto_SubCategoria_subc_subcategoriaid
,
Calidad_cali_calidadid: $scope.Calidad_cali_calidadid
,
DetalleGarantia_dega_detallegarantiaid: $scope.DetalleGarantia_dega_detallegarantiaid
,
detve_detalleventaid: $scope.detve_detalleventaid
}
$http.post("../../DataAccess/Servicios/detalleventa/ServiceInsertdetalleventa.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.detve_cantidad =null;
$scope.detve_precio =null;
$scope.detve_tipocambio =null;
$scope.Ventas_vent_ventaid =null;
$scope.Producto_prod_productoid =null;
$scope.Producto_SubCategoria_subc_subcategoriaid =null;
$scope.Calidad_cali_calidadid =null;
$scope.DetalleGarantia_dega_detallegarantiaid =null;
$scope.detve_detalleventaid =null;
$http.post("../../DataAccess/Servicios/detalleventa/ServiceSelectAlldetalleventa.php")
.success(function (data)
{
$scope.detalleventa = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
detve_cantidad: $scope.detve_cantidad
,
detve_precio: $scope.detve_precio
,
detve_tipocambio: $scope.detve_tipocambio
,
Ventas_vent_ventaid: $scope.Ventas_vent_ventaid
,
Producto_prod_productoid: $scope.Producto_prod_productoid
,
Producto_SubCategoria_subc_subcategoriaid: $scope.Producto_SubCategoria_subc_subcategoriaid
,
Calidad_cali_calidadid: $scope.Calidad_cali_calidadid
,
DetalleGarantia_dega_detallegarantiaid: $scope.DetalleGarantia_dega_detallegarantiaid
,
detve_detalleventaid: $scope.detve_detalleventaid
}
$http.post("../../DataAccess/Servicios/detalleventa/ServiceUpdatedetalleventa.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.detve_cantidad =null;
$scope.detve_precio =null;
$scope.detve_tipocambio =null;
$scope.Ventas_vent_ventaid =null;
$scope.Producto_prod_productoid =null;
$scope.Producto_SubCategoria_subc_subcategoriaid =null;
$scope.Calidad_cali_calidadid =null;
$scope.DetalleGarantia_dega_detallegarantiaid =null;
$scope.detve_detalleventaid =null;
$http.post("../../DataAccess/Servicios/detalleventa/ServiceSelectAlldetalleventa.php")
.success(function (data)
{
$scope.detalleventa = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.detve_cantidad = data.detve_cantidad;
$scope.detve_precio = data.detve_precio;
$scope.detve_tipocambio = data.detve_tipocambio;
$scope.Ventas_vent_ventaid = data.Ventas_vent_ventaid;
$scope.Producto_prod_productoid = data.Producto_prod_productoid;
$scope.Producto_SubCategoria_subc_subcategoriaid = data.Producto_SubCategoria_subc_subcategoriaid;
$scope.Calidad_cali_calidadid = data.Calidad_cali_calidadid;
$scope.DetalleGarantia_dega_detallegarantiaid = data.DetalleGarantia_dega_detallegarantiaid;
$scope.detve_detalleventaid = data.detve_detalleventaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
detve_detalleventaid: data.detve_detalleventaid
}
$http.post("../../DataAccess/Servicios/detalleventa/ServiceDeletedetalleventa.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/detalleventa/ServiceSelectAlldetalleventa.php")
.success(function (data)
{
$scope.detalleventa = data;
})
.error(function (error)
{
})

}
});
