var app = angular.module('clientesApp', ['directivas']);
app.controller('clientesController', function($scope, $http) {
$scope.clie_nombre = null;
$scope.clie_amaterno = null;
$scope.clie_apaterno = null;
$scope.clie_email = null;
$scope.clie_emailrazon = null;
$scope.clie_fechaingresosistema = null;
$scope.clie_razonsocial = null;
$scope.clie_observaciones = null;
$scope.clie_rfc = null;
$scope.clie_fax = null;
$scope.clie_clienteid = null;
$scope.clientes = [];
$http.post("../../DataAccess/Servicios/clientes/ServiceSelectAllclientes.php")
.success(function(data) {
$scope.clientes = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.clie_clienteid ==null)
{
var parametros = {
clie_nombre: $scope.clie_nombre
,
clie_amaterno: $scope.clie_amaterno
,
clie_apaterno: $scope.clie_apaterno
,
clie_email: $scope.clie_email
,
clie_emailrazon: $scope.clie_emailrazon
,
clie_fechaingresosistema: $scope.clie_fechaingresosistema
,
clie_razonsocial: $scope.clie_razonsocial
,
clie_observaciones: $scope.clie_observaciones
,
clie_rfc: $scope.clie_rfc
,
clie_fax: $scope.clie_fax
,
clie_clienteid: $scope.clie_clienteid
}
$http.post("../../DataAccess/Servicios/clientes/ServiceInsertclientes.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.clie_nombre =null;
$scope.clie_amaterno =null;
$scope.clie_apaterno =null;
$scope.clie_email =null;
$scope.clie_emailrazon =null;
$scope.clie_fechaingresosistema =null;
$scope.clie_razonsocial =null;
$scope.clie_observaciones =null;
$scope.clie_rfc =null;
$scope.clie_fax =null;
$scope.clie_clienteid =null;
$http.post("../../DataAccess/Servicios/clientes/ServiceSelectAllclientes.php")
.success(function (data)
{
$scope.clientes = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
clie_nombre: $scope.clie_nombre
,
clie_amaterno: $scope.clie_amaterno
,
clie_apaterno: $scope.clie_apaterno
,
clie_email: $scope.clie_email
,
clie_emailrazon: $scope.clie_emailrazon
,
clie_fechaingresosistema: $scope.clie_fechaingresosistema
,
clie_razonsocial: $scope.clie_razonsocial
,
clie_observaciones: $scope.clie_observaciones
,
clie_rfc: $scope.clie_rfc
,
clie_fax: $scope.clie_fax
,
clie_clienteid: $scope.clie_clienteid
}
$http.post("../../DataAccess/Servicios/clientes/ServiceUpdateclientes.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.clie_nombre =null;
$scope.clie_amaterno =null;
$scope.clie_apaterno =null;
$scope.clie_email =null;
$scope.clie_emailrazon =null;
$scope.clie_fechaingresosistema =null;
$scope.clie_razonsocial =null;
$scope.clie_observaciones =null;
$scope.clie_rfc =null;
$scope.clie_fax =null;
$scope.clie_clienteid =null;
$http.post("../../DataAccess/Servicios/clientes/ServiceSelectAllclientes.php")
.success(function (data)
{
$scope.clientes = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.clie_nombre = data.clie_nombre;
$scope.clie_amaterno = data.clie_amaterno;
$scope.clie_apaterno = data.clie_apaterno;
$scope.clie_email = data.clie_email;
$scope.clie_emailrazon = data.clie_emailrazon;
$scope.clie_fechaingresosistema = data.clie_fechaingresosistema;
$scope.clie_razonsocial = data.clie_razonsocial;
$scope.clie_observaciones = data.clie_observaciones;
$scope.clie_rfc = data.clie_rfc;
$scope.clie_fax = data.clie_fax;
$scope.clie_clienteid = data.clie_clienteid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
clie_clienteid: data.clie_clienteid
}
$http.post("../../DataAccess/Servicios/clientes/ServiceDeleteclientes.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/clientes/ServiceSelectAllclientes.php")
.success(function (data)
{
$scope.clientes = data;
})
.error(function (error)
{
})

}
});
