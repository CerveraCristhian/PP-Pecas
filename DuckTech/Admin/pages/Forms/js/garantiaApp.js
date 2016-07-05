var app = angular.module('garantiaApp', ['directivas']);
app.controller('garantiaController', function($scope, $http) {
$scope.gara_tipogarantia = null;
$scope.gara_garantiaid = null;
$scope.garantia = [];
$http.post("../../DataAccess/Servicios/garantia/ServiceSelectAllgarantia.php")
.success(function(data) {
$scope.garantia = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.gara_garantiaid ==null)
{
var parametros = {
gara_tipogarantia: $scope.gara_tipogarantia
,
gara_garantiaid: $scope.gara_garantiaid
}
$http.post("../../DataAccess/Servicios/garantia/ServiceInsertgarantia.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.gara_tipogarantia =null;
$scope.gara_garantiaid =null;
$http.post("../../DataAccess/Servicios/garantia/ServiceSelectAllgarantia.php")
.success(function (data)
{
$scope.garantia = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
gara_tipogarantia: $scope.gara_tipogarantia
,
gara_garantiaid: $scope.gara_garantiaid
}
$http.post("../../DataAccess/Servicios/garantia/ServiceUpdategarantia.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.gara_tipogarantia =null;
$scope.gara_garantiaid =null;
$http.post("../../DataAccess/Servicios/garantia/ServiceSelectAllgarantia.php")
.success(function (data)
{
$scope.garantia = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.gara_tipogarantia = data.gara_tipogarantia;
$scope.gara_garantiaid = data.gara_garantiaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
gara_garantiaid: data.gara_garantiaid
}
$http.post("../../DataAccess/Servicios/garantia/ServiceDeletegarantia.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/garantia/ServiceSelectAllgarantia.php")
.success(function (data)
{
$scope.garantia = data;
})
.error(function (error)
{
})

}
});
