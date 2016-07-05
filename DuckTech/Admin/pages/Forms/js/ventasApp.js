var app = angular.module('ventasApp', ['directivas']);
app.controller('ventasController', function($scope, $http) {
$scope.vent_fecha = null;
$scope.vent_subtotal = null;
$scope.vent_iva = null;
$scope.vent_total = null;
$scope.vent_ventaid = null;
$scope.ventas = [];
$http.post("../../DataAccess/Servicios/ventas/ServiceSelectAllventas.php")
.success(function(data) {
$scope.ventas = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.vent_ventaid ==null)
{
var parametros = {
vent_fecha: $scope.vent_fecha
,
vent_subtotal: $scope.vent_subtotal
,
vent_iva: $scope.vent_iva
,
vent_total: $scope.vent_total
,
vent_ventaid: $scope.vent_ventaid
}
$http.post("../../DataAccess/Servicios/ventas/ServiceInsertventas.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.vent_fecha =null;
$scope.vent_subtotal =null;
$scope.vent_iva =null;
$scope.vent_total =null;
$scope.vent_ventaid =null;
$http.post("../../DataAccess/Servicios/ventas/ServiceSelectAllventas.php")
.success(function (data)
{
$scope.ventas = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
vent_fecha: $scope.vent_fecha
,
vent_subtotal: $scope.vent_subtotal
,
vent_iva: $scope.vent_iva
,
vent_total: $scope.vent_total
,
vent_ventaid: $scope.vent_ventaid
}
$http.post("../../DataAccess/Servicios/ventas/ServiceUpdateventas.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.vent_fecha =null;
$scope.vent_subtotal =null;
$scope.vent_iva =null;
$scope.vent_total =null;
$scope.vent_ventaid =null;
$http.post("../../DataAccess/Servicios/ventas/ServiceSelectAllventas.php")
.success(function (data)
{
$scope.ventas = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.vent_fecha = data.vent_fecha;
$scope.vent_subtotal = data.vent_subtotal;
$scope.vent_iva = data.vent_iva;
$scope.vent_total = data.vent_total;
$scope.vent_ventaid = data.vent_ventaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
vent_ventaid: data.vent_ventaid
}
$http.post("../../DataAccess/Servicios/ventas/ServiceDeleteventas.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/ventas/ServiceSelectAllventas.php")
.success(function (data)
{
$scope.ventas = data;
})
.error(function (error)
{
})

}
});
