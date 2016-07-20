var app = angular.module('ordencompraApp', ['directivas']);
app.controller('ordencompraController', function($scope, $http) {
$scope.orco_usuariowebid = null;
$scope.orco_total = null;
$scope.orco_fecha = null;
$scope.orco_estatus = null;
$scope.orco_ordencompraid = null;
$scope.ordencompra = [];
ActualizarContenido();
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.orco_ordencompraid ==null)
{
var parametros = { method: 'insertordencompra',
orco_usuariowebid: $scope.orco_usuariowebid
,
orco_total: $scope.orco_total
,
orco_fecha: $scope.orco_fecha
,
orco_estatus: $scope.orco_estatus
,
orco_ordencompraid: $scope.orco_ordencompraid
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.orco_usuariowebid =null;
$scope.orco_total =null;
$scope.orco_fecha =null;
$scope.orco_estatus =null;
$scope.orco_ordencompraid =null;
ActualizarContenido();
})}
else
{
var parametros = {method: 'updateordencompra',
orco_usuariowebid: $scope.orco_usuariowebid
,
orco_total: $scope.orco_total
,
orco_fecha: $scope.orco_fecha
,
orco_estatus: $scope.orco_estatus
,
orco_ordencompraid: $scope.orco_ordencompraid
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.orco_usuariowebid =null;
$scope.orco_total =null;
$scope.orco_fecha =null;
$scope.orco_estatus =null;
$scope.orco_ordencompraid =null;
ActualizarContenido();
})
}


}
}
$scope.Editar = function (data)
{
$scope.orco_usuariowebid = data.orco_usuariowebid;
$scope.orco_total = data.orco_total;
$scope.orco_fecha = data.orco_fecha;
$scope.orco_estatus = data.orco_estatus;
$scope.orco_ordencompraid = data.orco_ordencompraid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = { method: 'deleteordencompra',
orco_ordencompraid: data.orco_ordencompraid
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
var parametros = {method: 'selectordencompra'}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.ordencompra = data;
})
.error(function (error)
{
})

}
});
