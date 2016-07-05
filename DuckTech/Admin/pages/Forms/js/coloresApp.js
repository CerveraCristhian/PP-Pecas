var app = angular.module('coloresApp', ['directivas']);
app.controller('coloresController', function($scope, $http) {
$scope.colo_nombre = null;
$scope.colo_activo = null;
$scope.colo_colorid = null;
$scope.colores = [];
var parametros = {
	method:'selectColores'
}
$http.post("../../Commun/commun.php",parametros)
.success(function(data) {
$scope.colores = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.colo_colorid ==null)
{
var parametros = {
colo_nombre: $scope.colo_nombre
,
colo_activo: $scope.colo_activo
,
colo_colorid: $scope.colo_colorid,
method : 'insertColores'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.colo_nombre =null;
$scope.colo_activo =null;
$scope.colo_colorid =null;
var parametros = {
	method:'selectColores'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.colores = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
colo_nombre: $scope.colo_nombre
,
colo_activo: $scope.colo_activo
,
colo_colorid: $scope.colo_colorid,
method:'updateColores'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.colo_nombre =null;
$scope.colo_activo =null;
$scope.colo_colorid =null;
ActualizarContenido();

})

}
}
}
$scope.Editar = function (data)
{
$scope.colo_nombre = data.colo_nombre;
$scope.colo_activo = data.colo_activo;
$scope.colo_colorid = data.colo_colorid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
colo_colorid: data.colo_colorid,
method:'deleteColores'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){
var parametros = {
	method : 'selectColores'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.colores = data;
})
.error(function (error)
{
})

}
});
