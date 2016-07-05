var app = angular.module('categoriaApp', ['directivas']);
app.controller('categoriaController', function($scope, $http) {
$scope.cate_nombre = null;
$scope.cate_Activo = null;
$scope.cate_fechacreacion = null;
$scope.cate_fechamodificacion = null;
$scope.cate_usuariocreacion = null;
$scope.cate_usuariomodificacion = null;
$scope.cate_categoriaid = null;
$scope.categoria = [];
var parametros = {
        method: 'selectCategoria'
    }
$http.post("../../Commun/commun.php",parametros)
.success(function(data) {
$scope.categoria = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.cate_categoriaid ==null)
{
var parametros = {
cate_nombre: $scope.cate_nombre
,
cate_Activo: $scope.cate_Activo
,
cate_fechacreacion: $scope.cate_fechacreacion
,
cate_fechamodificacion: $scope.cate_fechamodificacion
,
cate_usuariocreacion: $scope.cate_usuariocreacion
,
cate_usuariomodificacion: $scope.cate_usuariomodificacion
,
cate_categoriaid: $scope.cate_categoriaid,
method: 'insertCategoria'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.cate_nombre =null;
$scope.cate_Activo =null;
$scope.cate_fechacreacion =null;
$scope.cate_fechamodificacion =null;
$scope.cate_usuariocreacion =null;
$scope.cate_usuariomodificacion =null;
$scope.cate_categoriaid =null;
var parametros = {
	method:'selectCategoria'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.categoria = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
cate_nombre: $scope.cate_nombre
,
cate_Activo: $scope.cate_Activo
,
cate_fechacreacion: $scope.cate_fechacreacion
,
cate_fechamodificacion: $scope.cate_fechamodificacion
,
cate_usuariocreacion: $scope.cate_usuariocreacion
,
cate_usuariomodificacion: $scope.cate_usuariomodificacion
,
cate_categoriaid: $scope.cate_categoriaid,
method : 'updateCategoria'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.cate_nombre =null;
$scope.cate_Activo =null;
$scope.cate_fechacreacion =null;
$scope.cate_fechamodificacion =null;
$scope.cate_usuariocreacion =null;
$scope.cate_usuariomodificacion =null;
$scope.cate_categoriaid =null;
var parametros = {
	method:'selectCategoria'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.categoria = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.cate_nombre = data.cate_nombre;
$scope.cate_Activo = data.cate_Activo;
$scope.cate_fechacreacion = data.cate_fechacreacion;
$scope.cate_fechamodificacion = data.cate_fechamodificacion;
$scope.cate_usuariocreacion = data.cate_usuariocreacion;
$scope.cate_usuariomodificacion = data.cate_usuariomodificacion;
$scope.cate_categoriaid = data.cate_categoriaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
cate_categoriaid: data.cate_categoriaid,
method:'deleteCategoria'
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
var parametros={
	method:'selectCategoria'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.categoria = data;
})
.error(function (error)
{
})

}
});
