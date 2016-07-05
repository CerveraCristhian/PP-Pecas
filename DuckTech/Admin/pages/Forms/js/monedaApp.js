var app = angular.module('monedaApp', ['directivas']);
app.controller('monedaController', function($scope, $http) {
$scope.mone_nombre = null;
$scope.mone_simbolo = null;
$scope.mone_monedaid = null;
$scope.moneda = [];
ActualizarContenido();
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.mone_monedaid ==null)
{
var parametros = {
mone_nombre: $scope.mone_nombre
,
mone_simbolo: $scope.mone_simbolo
,
mone_monedaid: $scope.mone_monedaid,
method:'insertMoneda'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.mone_nombre =null;
$scope.mone_simbolo =null;
$scope.mone_monedaid =null;
ActualizarContenido();

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
mone_nombre: $scope.mone_nombre
,
mone_simbolo: $scope.mone_simbolo
,
mone_monedaid: $scope.mone_monedaid,
method:'updateMoneda'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.mone_nombre =null;
$scope.mone_simbolo =null;
$scope.mone_monedaid =null;
ActualizarContenido();

})

}
}
}
$scope.Editar = function (data)
{
$scope.mone_nombre = data.mone_nombre;
$scope.mone_simbolo = data.mone_simbolo;
$scope.mone_monedaid = data.mone_monedaid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
mone_monedaid: data.mone_monedaid,
method:'deleteMoneda'
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
	method:'selectMoneda'
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.moneda = data;
})
.error(function (error)
{
})

}
});
