var app = angular.module('detalleinsumoproductoApp', ['directivas']);
app.controller('detalleinsumoproductoController', function($scope, $http) {
$scope.DetalleVenta_detve_detalleventaid = null;
$scope.Insumos_insu_insumosid = null;
$scope.dein_detalleinsumoproductoid = null;
$scope.detalleinsumoproducto = [];
$http.post("../../DataAccess/Servicios/detalleinsumoproducto/ServiceSelectAlldetalleinsumoproducto.php")
.success(function(data) {
$scope.detalleinsumoproducto = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.dein_detalleinsumoproductoid ==null)
{
var parametros = {
DetalleVenta_detve_detalleventaid: $scope.DetalleVenta_detve_detalleventaid
,
Insumos_insu_insumosid: $scope.Insumos_insu_insumosid
,
dein_detalleinsumoproductoid: $scope.dein_detalleinsumoproductoid
}
$http.post("../../DataAccess/Servicios/detalleinsumoproducto/ServiceInsertdetalleinsumoproducto.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.DetalleVenta_detve_detalleventaid =null;
$scope.Insumos_insu_insumosid =null;
$scope.dein_detalleinsumoproductoid =null;
$http.post("../../DataAccess/Servicios/detalleinsumoproducto/ServiceSelectAlldetalleinsumoproducto.php")
.success(function (data)
{
$scope.detalleinsumoproducto = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
DetalleVenta_detve_detalleventaid: $scope.DetalleVenta_detve_detalleventaid
,
Insumos_insu_insumosid: $scope.Insumos_insu_insumosid
,
dein_detalleinsumoproductoid: $scope.dein_detalleinsumoproductoid
}
$http.post("../../DataAccess/Servicios/detalleinsumoproducto/ServiceUpdatedetalleinsumoproducto.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.DetalleVenta_detve_detalleventaid =null;
$scope.Insumos_insu_insumosid =null;
$scope.dein_detalleinsumoproductoid =null;
$http.post("../../DataAccess/Servicios/detalleinsumoproducto/ServiceSelectAlldetalleinsumoproducto.php")
.success(function (data)
{
$scope.detalleinsumoproducto = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.DetalleVenta_detve_detalleventaid = data.DetalleVenta_detve_detalleventaid;
$scope.Insumos_insu_insumosid = data.Insumos_insu_insumosid;
$scope.dein_detalleinsumoproductoid = data.dein_detalleinsumoproductoid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
dein_detalleinsumoproductoid: data.dein_detalleinsumoproductoid
}
$http.post("../../DataAccess/Servicios/detalleinsumoproducto/ServiceDeletedetalleinsumoproducto.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/detalleinsumoproducto/ServiceSelectAlldetalleinsumoproducto.php")
.success(function (data)
{
$scope.detalleinsumoproducto = data;
})
.error(function (error)
{
})

}
});
