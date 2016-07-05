var app = angular.module('ciudadApp', ['directivas']);
app.controller('ciudadController', function($scope, $http) {
$scope.ciud_nombre = null;
$scope.Estado_esta_estadoid = null;
$scope.ciud_ciudadid = null;
$scope.ciudad = [];
$http.post("../../DataAccess/Servicios/ciudad/ServiceSelectAllciudad.php")
.success(function(data) {
$scope.ciudad = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.ciud_ciudadid ==null)
{
var parametros = {
ciud_nombre: $scope.ciud_nombre
,
Estado_esta_estadoid: $scope.Estado_esta_estadoid
,
ciud_ciudadid: $scope.ciud_ciudadid
}
$http.post("../../DataAccess/Servicios/ciudad/ServiceInsertciudad.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.ciud_nombre =null;
$scope.Estado_esta_estadoid =null;
$scope.ciud_ciudadid =null;
$http.post("../../DataAccess/Servicios/ciudad/ServiceSelectAllciudad.php")
.success(function (data)
{
$scope.ciudad = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
ciud_nombre: $scope.ciud_nombre
,
Estado_esta_estadoid: $scope.Estado_esta_estadoid
,
ciud_ciudadid: $scope.ciud_ciudadid
}
$http.post("../../DataAccess/Servicios/ciudad/ServiceUpdateciudad.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.ciud_nombre =null;
$scope.Estado_esta_estadoid =null;
$scope.ciud_ciudadid =null;
$http.post("../../DataAccess/Servicios/ciudad/ServiceSelectAllciudad.php")
.success(function (data)
{
$scope.ciudad = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.ciud_nombre = data.ciud_nombre;
$scope.Estado_esta_estadoid = data.Estado_esta_estadoid;
$scope.ciud_ciudadid = data.ciud_ciudadid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
ciud_ciudadid: data.ciud_ciudadid
}
$http.post("../../DataAccess/Servicios/ciudad/ServiceDeleteciudad.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/ciudad/ServiceSelectAllciudad.php")
.success(function (data)
{
$scope.ciudad = data;
})
.error(function (error)
{
})

}
});
