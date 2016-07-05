var app = angular.module('marcaApp', ['directivas']);
app.controller('marcaController', function($scope, $http) {
$scope.marc_nombre = null;
$scope.marc_activo = null;
$scope.marc_marcaid = null;
$scope.marca = [];
var parametros = {
	method:'selectMarcas'
}
$http.post("../../Commun/commun.php",parametros)
.success(function(data) {
$scope.marca = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.marc_marcaid ==null)
{
var parametros = {
marc_nombre: $scope.marc_nombre
,
marc_activo: $scope.marc_activo
,
marc_marcaid: $scope.marc_marcaid,
method:'insertMarcas'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.marc_nombre =null;
$scope.marc_activo =null;
$scope.marc_marcaid =null;
var parametros = {
	method:'selectMarcas'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.marca = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
marc_nombre: $scope.marc_nombre
,
marc_activo: $scope.marc_activo
,
marc_marcaid: $scope.marc_marcaid,
method:'updateMarcas'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.marc_nombre =null;
$scope.marc_activo =null;
$scope.marc_marcaid =null;
var parametros = {
	method:'selectMarcas'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.marca = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.marc_nombre = data.marc_nombre;
$scope.marc_activo = data.marc_activo;
$scope.marc_marcaid = data.marc_marcaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
marc_marcaid: data.marc_marcaid,
method:'deleteMarcas'
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
	method:'selectMarcas'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.marca = data;
})
.error(function (error)
{
})

}
});
