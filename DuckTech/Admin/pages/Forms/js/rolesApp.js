var app = angular.module('rolesApp', ['directivas']);
app.controller('rolesController', function($scope, $http) {
$scope.rol_nombre = null;
$scope.rol_rolid = null;
$scope.roles = [];
var parametros = {
	method:'selectRoles'
}
$http.post("../../Commun/commun.php",parametros)
.success(function(data) {
$scope.roles = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.rol_rolid ==null)
{
var parametros = {
rol_nombre: $scope.rol_nombre
,
rol_rolid: $scope.rol_rolid,
method:'insertRoles'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.rol_nombre =null;
$scope.rol_rolid =null;
var parametros = {
	method:'selectRoles'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.roles = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
rol_nombre: $scope.rol_nombre
,
rol_rolid: $scope.rol_rolid,
method:'updateRoles'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.rol_nombre =null;
$scope.rol_rolid =null;
var parametros = {
	method:'selectRoles'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.roles = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.rol_nombre = data.rol_nombre;
$scope.rol_rolid = data.rol_rolid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
rol_rolid: data.rol_rolid,
method:'deleteRoles'
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
	method:'selectRoles'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.roles = data;
})
.error(function (error)
{
})

}
});
