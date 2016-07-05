var app = angular.module('paisesApp', ['directivas']);
app.controller('paisesController', function($scope, $http) {
$scope.pais_nombre = null;
$scope.pais_paisid = null;
$scope.paises = [];
$http.post("../../DataAccess/Servicios/paises/ServiceSelectAllpaises.php")
.success(function(data) {
$scope.paises = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.pais_paisid ==null)
{
var parametros = {
pais_nombre: $scope.pais_nombre
,
pais_paisid: $scope.pais_paisid
}
$http.post("../../DataAccess/Servicios/paises/ServiceInsertpaises.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.pais_nombre =null;
$scope.pais_paisid =null;
$http.post("../../DataAccess/Servicios/paises/ServiceSelectAllpaises.php")
.success(function (data)
{
$scope.paises = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
pais_nombre: $scope.pais_nombre
,
pais_paisid: $scope.pais_paisid
}
$http.post("../../DataAccess/Servicios/paises/ServiceUpdatepaises.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.pais_nombre =null;
$scope.pais_paisid =null;
$http.post("../../DataAccess/Servicios/paises/ServiceSelectAllpaises.php")
.success(function (data)
{
$scope.paises = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.pais_nombre = data.pais_nombre;
$scope.pais_paisid = data.pais_paisid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
pais_paisid: data.pais_paisid
}
$http.post("../../DataAccess/Servicios/paises/ServiceDeletepaises.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/paises/ServiceSelectAllpaises.php")
.success(function (data)
{
$scope.paises = data;
})
.error(function (error)
{
})

}
});
