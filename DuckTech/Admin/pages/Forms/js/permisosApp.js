var app = angular.module('permisosApp', ['directivas']);
app.controller('permisosController', function($scope, $http) {
$scope.perm_nombre = null;
$scope.perm_permisoid = null;
$scope.permisos = [];
var parametros = {
	method:'selectPermisos'
}
$http.post("../../Commun/commun.php",parametros)
.success(function(data) {
$scope.permisos = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.perm_permisoid ==null)
{
var parametros = {
perm_nombre: $scope.perm_nombre
,
perm_permisoid: $scope.perm_permisoid,
method:'insertPermisos'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.perm_nombre =null;
$scope.perm_permisoid =null;
var parametros = {
	method:'selectPermisos'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.permisos = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
perm_nombre: $scope.perm_nombre
,
perm_permisoid: $scope.perm_permisoid,
method:'updatePermisos'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.perm_nombre =null;
$scope.perm_permisoid =null;
var parametros = {
	method:'selectPermisos'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.permisos = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.perm_nombre = data.perm_nombre;
$scope.perm_permisoid = data.perm_permisoid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
perm_permisoid: data.perm_permisoid,
method:'deletePermisos'
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
	method:'selectPermisos'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.permisos = data;
})
.error(function (error)
{
})

}
});
