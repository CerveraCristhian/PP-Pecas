var app = angular.module('comprasApp', ['directivas']);
app.controller('comprasController', function($scope, $http) {
$scope.comp_fecha = null;
$scope.comp_subtotal = null;
$scope.comp_iva = null;
$scope.comp_total = null;
$scope.comp_compraid = null;
$scope.compras = [];
$http.post("../../DataAccess/Servicios/compras/ServiceSelectAllcompras.php")
.success(function(data) {
$scope.compras = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.comp_compraid ==null)
{
var parametros = {
comp_fecha: $scope.comp_fecha
,
comp_subtotal: $scope.comp_subtotal
,
comp_iva: $scope.comp_iva
,
comp_total: $scope.comp_total
,
comp_compraid: $scope.comp_compraid
}
$http.post("../../DataAccess/Servicios/compras/ServiceInsertcompras.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.comp_fecha =null;
$scope.comp_subtotal =null;
$scope.comp_iva =null;
$scope.comp_total =null;
$scope.comp_compraid =null;
$http.post("../../DataAccess/Servicios/compras/ServiceSelectAllcompras.php")
.success(function (data)
{
$scope.compras = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
comp_fecha: $scope.comp_fecha
,
comp_subtotal: $scope.comp_subtotal
,
comp_iva: $scope.comp_iva
,
comp_total: $scope.comp_total
,
comp_compraid: $scope.comp_compraid
}
$http.post("../../DataAccess/Servicios/compras/ServiceUpdatecompras.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.comp_fecha =null;
$scope.comp_subtotal =null;
$scope.comp_iva =null;
$scope.comp_total =null;
$scope.comp_compraid =null;
$http.post("../../DataAccess/Servicios/compras/ServiceSelectAllcompras.php")
.success(function (data)
{
$scope.compras = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.comp_fecha = data.comp_fecha;
$scope.comp_subtotal = data.comp_subtotal;
$scope.comp_iva = data.comp_iva;
$scope.comp_total = data.comp_total;
$scope.comp_compraid = data.comp_compraid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
comp_compraid: data.comp_compraid
}
$http.post("../../DataAccess/Servicios/compras/ServiceDeletecompras.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/compras/ServiceSelectAllcompras.php")
.success(function (data)
{
$scope.compras = data;
})
.error(function (error)
{
})

}
});
