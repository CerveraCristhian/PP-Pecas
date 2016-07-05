var app = angular.module('usuariosApp', ['directivas']);
app.controller('usuariosController', function($scope, $http) {
$scope.user_name = null;
$scope.user_password = null;
$scope.Roles_rol_rolid = null;
$scope.user_usuarioid = null;
$scope.usuarios = [];
$scope.roles = [];
var parametros ={
	method:'selectRoles'
}
$http.post("../../Commun/commun.php",parametros)
.success(function(data) {
$scope.roles = data;
})
.error(function(error) {})
var parametros = {
	method:'selectUsuarios'
}
$http.post("../../Commun/commun.php",parametros)
.success(function(data) {
$scope.usuarios = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.user_usuarioid ==null)
{
var parametros = {
user_name: $scope.user_name
,
user_password: $scope.user_password
,
Roles_rol_rolid: $scope.Roles_rol_rolid.rol_rolid
,
user_usuarioid: $scope.user_usuarioid,
method:'insertUsuarios'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.user_name =null;
$scope.user_password =null;
$scope.Roles_rol_rolid =null;
$scope.user_usuarioid =null;
var parametros = {
	method:'selectUsuarios'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.usuarios = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
user_name: $scope.user_name
,
user_password: $scope.user_password
,
Roles_rol_rolid: $scope.Roles_rol_rolid.rol_rolid
,
user_usuarioid: $scope.user_usuarioid,
method:'updateUsuarios'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.user_name =null;
$scope.user_password =null;
$scope.Roles_rol_rolid =null;
$scope.user_usuarioid =null;
var parametros ={
	method:'selectUsuarios'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.usuarios = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.user_name = data.user_name;
$scope.user_password = data.user_password;
$scope.Roles_rol_rolid = data.Roles_rol_rolid;
$scope.user_usuarioid = data.user_usuarioid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
user_usuarioid: data.user_usuarioid,
method:'deleteUsuarios'
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
	method:'selectUsuarios'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.usuarios = data;
})
.error(function (error)
{
})

}
});
