var app = angular.module('subcategoriaApp', ['directivas']);
app.controller('subcategoriaController', function($scope, $http) {
$scope.subc_nombre = null;
$scope.subc_activo = null;
$scope.subc_fechacreacion = null;
$scope.subc_fechamodificacion = null;
$scope.subc_usuariocreacion = null;
$scope.subc_usuariomodificacion = null;
$scope.Categoria_cate_categoriaid = null;
$scope.subc_subcategoriaid = null;
$scope.subcategoria = [];
ActualizarContenido();

var parametros={
	method:'selectCategoria'
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
		
if($scope.subc_subcategoriaid ==null)
{
var parametros = {
subc_nombre: $scope.subc_nombre
,
subc_activo: $scope.subc_activo
,
subc_fechacreacion: $scope.subc_fechacreacion
,
subc_fechamodificacion: $scope.subc_fechamodificacion
,
subc_usuariocreacion: $scope.subc_usuariocreacion
,
subc_usuariomodificacion: $scope.subc_usuariomodificacion
,
Categoria_cate_categoriaid: $scope.CategoriaSelected.cate_categoriaid
,
subc_subcategoriaid: $scope.subc_subcategoriaid,
method:'insertSubCategoria'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.subc_nombre =null;
$scope.subc_activo =null;
$scope.subc_fechacreacion =null;
$scope.subc_fechamodificacion =null;
$scope.subc_usuariocreacion =null;
$scope.subc_usuariomodificacion =null;
$scope.Categoria_cate_categoriaid =null;
$scope.subc_subcategoriaid =null;
ActualizarContenido();

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
subc_nombre: $scope.subc_nombre
,
subc_activo: $scope.subc_activo
,
subc_fechacreacion: $scope.subc_fechacreacion
,
subc_fechamodificacion: $scope.subc_fechamodificacion
,
subc_usuariocreacion: $scope.subc_usuariocreacion
,
subc_usuariomodificacion: $scope.subc_usuariomodificacion
,
Categoria_cate_categoriaid: $scope.Categoria_cate_categoriaid
,
subc_subcategoriaid: $scope.subc_subcategoriaid,
method:'updateSubCategoria'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.subc_nombre =null;
$scope.subc_activo =null;
$scope.subc_fechacreacion =null;
$scope.subc_fechamodificacion =null;
$scope.subc_usuariocreacion =null;
$scope.subc_usuariomodificacion =null;
$scope.Categoria_cate_categoriaid =null;
$scope.subc_subcategoriaid =null;
ActualizarContenido();

})

}
}
}


$scope.Categoria_OnChange = function(data)
{
	$scope.Categoria_cate_categoriaid = data.cate_categoriaid;
}

$scope.Editar = function (data)
{
$scope.subc_nombre = data.subc_nombre;
$scope.subc_activo = data.subc_activo;
$scope.subc_fechacreacion = data.subc_fechacreacion;
$scope.subc_fechamodificacion = data.subc_fechamodificacion;
$scope.subc_usuariocreacion = data.subc_usuariocreacion;
$scope.subc_usuariomodificacion = data.subc_usuariomodificacion;
$scope.Categoria_cate_categoriaid = data.Categoria_cate_categoriaid;
$scope.subc_subcategoriaid = data.subc_subcategoriaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
subc_subcategoriaid: data.subc_subcategoriaid,
method:'deleteSubCategoria'
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
	method:'selectSubCategoria'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.subcategoria = data;
})
.error(function (error)
{
})

}
});
