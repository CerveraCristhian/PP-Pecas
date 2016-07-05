var app = angular.module('tipomoduloApp', ['directivas']);
app.controller('tipomoduloController', function($scope, $http) {
$scope.timo_nombre = null;
$scope.timo_tipomoduloid = null;
$scope.tipomodulo = [];
$http.post("../../DataAccess/Servicios/tipomodulo/ServiceSelectAlltipomodulo.php")
.success(function(data) {
$scope.tipomodulo = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.timo_tipomoduloid ==null)
{
var parametros = {
timo_nombre: $scope.timo_nombre
,
timo_tipomoduloid: $scope.timo_tipomoduloid
}
$http.post("../../DataAccess/Servicios/tipomodulo/ServiceInserttipomodulo.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.timo_nombre =null;
$scope.timo_tipomoduloid =null;
$http.post("../../DataAccess/Servicios/tipomodulo/ServiceSelectAlltipomodulo.php")
.success(function (data)
{
$scope.tipomodulo = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
timo_nombre: $scope.timo_nombre
,
timo_tipomoduloid: $scope.timo_tipomoduloid
}
$http.post("../../DataAccess/Servicios/tipomodulo/ServiceUpdatetipomodulo.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.timo_nombre =null;
$scope.timo_tipomoduloid =null;
$http.post("../../DataAccess/Servicios/tipomodulo/ServiceSelectAlltipomodulo.php")
.success(function (data)
{
$scope.tipomodulo = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.timo_nombre = data.timo_nombre;
$scope.timo_tipomoduloid = data.timo_tipomoduloid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
timo_tipomoduloid: data.timo_tipomoduloid
}
$http.post("../../DataAccess/Servicios/tipomodulo/ServiceDeletetipomodulo.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/tipomodulo/ServiceSelectAlltipomodulo.php")
.success(function (data)
{
$scope.tipomodulo = data;
})
.error(function (error)
{
})

}
});
