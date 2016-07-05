var app = angular.module('tipoformaApp', ['directivas']);
app.controller('tipoformaController', function($scope, $http) {
$scope.tifo_nombre = null;
$scope.tifo_tipoformaid = null;
$scope.tipoforma = [];
$http.post("../../DataAccess/Servicios/tipoforma/ServiceSelectAlltipoforma.php")
.success(function(data) {
$scope.tipoforma = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.tifo_tipoformaid ==null)
{
var parametros = {
tifo_nombre: $scope.tifo_nombre
,
tifo_tipoformaid: $scope.tifo_tipoformaid
}
$http.post("../../DataAccess/Servicios/tipoforma/ServiceInserttipoforma.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.tifo_nombre =null;
$scope.tifo_tipoformaid =null;
$http.post("../../DataAccess/Servicios/tipoforma/ServiceSelectAlltipoforma.php")
.success(function (data)
{
$scope.tipoforma = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
tifo_nombre: $scope.tifo_nombre
,
tifo_tipoformaid: $scope.tifo_tipoformaid
}
$http.post("../../DataAccess/Servicios/tipoforma/ServiceUpdatetipoforma.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.tifo_nombre =null;
$scope.tifo_tipoformaid =null;
$http.post("../../DataAccess/Servicios/tipoforma/ServiceSelectAlltipoforma.php")
.success(function (data)
{
$scope.tipoforma = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.tifo_nombre = data.tifo_nombre;
$scope.tifo_tipoformaid = data.tifo_tipoformaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
tifo_tipoformaid: data.tifo_tipoformaid
}
$http.post("../../DataAccess/Servicios/tipoforma/ServiceDeletetipoforma.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/tipoforma/ServiceSelectAlltipoforma.php")
.success(function (data)
{
$scope.tipoforma = data;
})
.error(function (error)
{
})

}
});
