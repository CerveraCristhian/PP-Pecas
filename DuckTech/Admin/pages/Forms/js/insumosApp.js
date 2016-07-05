var app = angular.module('insumosApp', ['directivas']);
app.controller('insumosController', function($scope, $http) {
$scope.insu_nombre = null;
$scope.insu_descripcion = null;
$scope.insu_insumosid = null;
$scope.insumos = [];
$http.post("../../DataAccess/Servicios/insumos/ServiceSelectAllinsumos.php")
.success(function(data) {
$scope.insumos = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.insu_insumosid ==null)
{
var parametros = {
insu_nombre: $scope.insu_nombre
,
insu_descripcion: $scope.insu_descripcion
,
insu_insumosid: $scope.insu_insumosid
}
$http.post("../../DataAccess/Servicios/insumos/ServiceInsertinsumos.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.insu_nombre =null;
$scope.insu_descripcion =null;
$scope.insu_insumosid =null;
$http.post("../../DataAccess/Servicios/insumos/ServiceSelectAllinsumos.php")
.success(function (data)
{
$scope.insumos = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
insu_nombre: $scope.insu_nombre
,
insu_descripcion: $scope.insu_descripcion
,
insu_insumosid: $scope.insu_insumosid
}
$http.post("../../DataAccess/Servicios/insumos/ServiceUpdateinsumos.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.insu_nombre =null;
$scope.insu_descripcion =null;
$scope.insu_insumosid =null;
$http.post("../../DataAccess/Servicios/insumos/ServiceSelectAllinsumos.php")
.success(function (data)
{
$scope.insumos = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.insu_nombre = data.insu_nombre;
$scope.insu_descripcion = data.insu_descripcion;
$scope.insu_insumosid = data.insu_insumosid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
insu_insumosid: data.insu_insumosid
}
$http.post("../../DataAccess/Servicios/insumos/ServiceDeleteinsumos.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/insumos/ServiceSelectAllinsumos.php")
.success(function (data)
{
$scope.insumos = data;
})
.error(function (error)
{
})

}
});
