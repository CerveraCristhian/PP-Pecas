var app = angular.module('detallegarantiaApp', ['directivas']);
app.controller('detallegarantiaController', function($scope, $http) {
$scope.dega_nombre = null;
$scope.Garantia_gara_garantiaid = null;
$scope.dega_detallegarantiaid = null;
$scope.detallegarantia = [];
$http.post("../../DataAccess/Servicios/detallegarantia/ServiceSelectAlldetallegarantia.php")
.success(function(data) {
$scope.detallegarantia = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.dega_detallegarantiaid ==null)
{
var parametros = {
dega_nombre: $scope.dega_nombre
,
Garantia_gara_garantiaid: $scope.Garantia_gara_garantiaid
,
dega_detallegarantiaid: $scope.dega_detallegarantiaid
}
$http.post("../../DataAccess/Servicios/detallegarantia/ServiceInsertdetallegarantia.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.dega_nombre =null;
$scope.Garantia_gara_garantiaid =null;
$scope.dega_detallegarantiaid =null;
$http.post("../../DataAccess/Servicios/detallegarantia/ServiceSelectAlldetallegarantia.php")
.success(function (data)
{
$scope.detallegarantia = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
dega_nombre: $scope.dega_nombre
,
Garantia_gara_garantiaid: $scope.Garantia_gara_garantiaid
,
dega_detallegarantiaid: $scope.dega_detallegarantiaid
}
$http.post("../../DataAccess/Servicios/detallegarantia/ServiceUpdatedetallegarantia.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.dega_nombre =null;
$scope.Garantia_gara_garantiaid =null;
$scope.dega_detallegarantiaid =null;
$http.post("../../DataAccess/Servicios/detallegarantia/ServiceSelectAlldetallegarantia.php")
.success(function (data)
{
$scope.detallegarantia = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.dega_nombre = data.dega_nombre;
$scope.Garantia_gara_garantiaid = data.Garantia_gara_garantiaid;
$scope.dega_detallegarantiaid = data.dega_detallegarantiaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
dega_detallegarantiaid: data.dega_detallegarantiaid
}
$http.post("../../DataAccess/Servicios/detallegarantia/ServiceDeletedetallegarantia.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/detallegarantia/ServiceSelectAlldetallegarantia.php")
.success(function (data)
{
$scope.detallegarantia = data;
})
.error(function (error)
{
})

}
});
