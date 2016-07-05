var app = angular.module('estadoApp', ['directivas']);
app.controller('estadoController', function($scope, $http) {
$scope.esta_nombre = null;
$scope.Paises_pais_paisid = null;
$scope.esta_estadoid = null;
$scope.estado = [];
$http.post("../../DataAccess/Servicios/estado/ServiceSelectAllestado.php")
.success(function(data) {
$scope.estado = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.esta_estadoid ==null)
{
var parametros = {
esta_nombre: $scope.esta_nombre
,
Paises_pais_paisid: $scope.Paises_pais_paisid
,
esta_estadoid: $scope.esta_estadoid
}
$http.post("../../DataAccess/Servicios/estado/ServiceInsertestado.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.esta_nombre =null;
$scope.Paises_pais_paisid =null;
$scope.esta_estadoid =null;
$http.post("../../DataAccess/Servicios/estado/ServiceSelectAllestado.php")
.success(function (data)
{
$scope.estado = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
esta_nombre: $scope.esta_nombre
,
Paises_pais_paisid: $scope.Paises_pais_paisid
,
esta_estadoid: $scope.esta_estadoid
}
$http.post("../../DataAccess/Servicios/estado/ServiceUpdateestado.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.esta_nombre =null;
$scope.Paises_pais_paisid =null;
$scope.esta_estadoid =null;
$http.post("../../DataAccess/Servicios/estado/ServiceSelectAllestado.php")
.success(function (data)
{
$scope.estado = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.esta_nombre = data.esta_nombre;
$scope.Paises_pais_paisid = data.Paises_pais_paisid;
$scope.esta_estadoid = data.esta_estadoid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
esta_estadoid: data.esta_estadoid
}
$http.post("../../DataAccess/Servicios/estado/ServiceDeleteestado.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/estado/ServiceSelectAllestado.php")
.success(function (data)
{
$scope.estado = data;
})
.error(function (error)
{
})

}
});
