var app = angular.module('direccionclienteApp', ['directivas']);
app.controller('direccionclienteController', function($scope, $http) {
$scope.direclie_calle = null;
$scope.direclie_numero = null;
$scope.direclie_colonia = null;
$scope.direclie_numeroexterior = null;
$scope.Clientes_clie_clienteid = null;
$scope.direclie_direccionclienteid = null;
$scope.direccioncliente = [];
$http.post("../../DataAccess/Servicios/direccioncliente/ServiceSelectAlldireccioncliente.php")
.success(function(data) {
$scope.direccioncliente = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.direclie_direccionclienteid ==null)
{
var parametros = {
direclie_calle: $scope.direclie_calle
,
direclie_numero: $scope.direclie_numero
,
direclie_colonia: $scope.direclie_colonia
,
direclie_numeroexterior: $scope.direclie_numeroexterior
,
Clientes_clie_clienteid: $scope.Clientes_clie_clienteid
,
direclie_direccionclienteid: $scope.direclie_direccionclienteid
}
$http.post("../../DataAccess/Servicios/direccioncliente/ServiceInsertdireccioncliente.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.direclie_calle =null;
$scope.direclie_numero =null;
$scope.direclie_colonia =null;
$scope.direclie_numeroexterior =null;
$scope.Clientes_clie_clienteid =null;
$scope.direclie_direccionclienteid =null;
$http.post("../../DataAccess/Servicios/direccioncliente/ServiceSelectAlldireccioncliente.php")
.success(function (data)
{
$scope.direccioncliente = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
direclie_calle: $scope.direclie_calle
,
direclie_numero: $scope.direclie_numero
,
direclie_colonia: $scope.direclie_colonia
,
direclie_numeroexterior: $scope.direclie_numeroexterior
,
Clientes_clie_clienteid: $scope.Clientes_clie_clienteid
,
direclie_direccionclienteid: $scope.direclie_direccionclienteid
}
$http.post("../../DataAccess/Servicios/direccioncliente/ServiceUpdatedireccioncliente.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.direclie_calle =null;
$scope.direclie_numero =null;
$scope.direclie_colonia =null;
$scope.direclie_numeroexterior =null;
$scope.Clientes_clie_clienteid =null;
$scope.direclie_direccionclienteid =null;
$http.post("../../DataAccess/Servicios/direccioncliente/ServiceSelectAlldireccioncliente.php")
.success(function (data)
{
$scope.direccioncliente = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.direclie_calle = data.direclie_calle;
$scope.direclie_numero = data.direclie_numero;
$scope.direclie_colonia = data.direclie_colonia;
$scope.direclie_numeroexterior = data.direclie_numeroexterior;
$scope.Clientes_clie_clienteid = data.Clientes_clie_clienteid;
$scope.direclie_direccionclienteid = data.direclie_direccionclienteid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
direclie_direccionclienteid: data.direclie_direccionclienteid
}
$http.post("../../DataAccess/Servicios/direccioncliente/ServiceDeletedireccioncliente.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/direccioncliente/ServiceSelectAlldireccioncliente.php")
.success(function (data)
{
$scope.direccioncliente = data;
})
.error(function (error)
{
})

}
});
