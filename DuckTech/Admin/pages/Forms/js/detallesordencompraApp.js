var app = angular.module('detallesordencompraApp', []);
app.controller('detallesordencompraController', function($scope, $http) {
$scope.detoc_ordencompraid = null;
$scope.detoc_productoid = null;
$scope.detoc_preciounitario = null;
$scope.detoc_cantidad = null;
$scope.detoc_total = null;
$scope.detoc_detalleordencompraid = null;
$scope.detallesordencompra = [];
ActualizarContenido();
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.detoc_detalleordencompraid ==null)
{
var parametros = { method: 'insertdetallesordencompra',
detoc_ordencompraid: $scope.detoc_ordencompraid
,
detoc_productoid: $scope.detoc_productoid
,
detoc_preciounitario: $scope.detoc_preciounitario
,
detoc_cantidad: $scope.detoc_cantidad
,
detoc_total: $scope.detoc_total
,
detoc_detalleordencompraid: $scope.detoc_detalleordencompraid
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.detoc_ordencompraid =null;
$scope.detoc_productoid =null;
$scope.detoc_preciounitario =null;
$scope.detoc_cantidad =null;
$scope.detoc_total =null;
$scope.detoc_detalleordencompraid =null;
ActualizarContenido();
})}
else
{
var parametros = {method: 'updatedetallesordencompra',
detoc_ordencompraid: $scope.detoc_ordencompraid
,
detoc_productoid: $scope.detoc_productoid
,
detoc_preciounitario: $scope.detoc_preciounitario
,
detoc_cantidad: $scope.detoc_cantidad
,
detoc_total: $scope.detoc_total
,
detoc_detalleordencompraid: $scope.detoc_detalleordencompraid
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.detoc_ordencompraid =null;
$scope.detoc_productoid =null;
$scope.detoc_preciounitario =null;
$scope.detoc_cantidad =null;
$scope.detoc_total =null;
$scope.detoc_detalleordencompraid =null;
ActualizarContenido();
})
}


}
}
$scope.Editar = function (data)
{
$scope.detoc_ordencompraid = data.detoc_ordencompraid;
$scope.detoc_productoid = data.detoc_productoid;
$scope.detoc_preciounitario = data.detoc_preciounitario;
$scope.detoc_cantidad = data.detoc_cantidad;
$scope.detoc_total = data.detoc_total;
$scope.detoc_detalleordencompraid = data.detoc_detalleordencompraid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = { method: 'deletedetallesordencompra',
detoc_detalleordencompraid: data.detoc_detalleordencompraid
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
var parametros = {method: 'selectdetallesordencompra'}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.detallesordencompra = data;
})
.error(function (error)
{
})

}
});
