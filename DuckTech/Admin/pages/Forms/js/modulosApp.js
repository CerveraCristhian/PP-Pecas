var app = angular.module('modulosApp', []);
app.controller('modulosController', function($scope, $http) {
$scope.modu_nombre = null;
$scope.TipoModulo_timo_tipomoduloid = null;
$scope.modulos = [];
ActualizarContenido();
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.TipoModulo_timo_tipomoduloid ==null)
{
var parametros = { method: 'insertmodulos',
modu_nombre: $scope.modu_nombre
,
TipoModulo_timo_tipomoduloid: $scope.TipoModulo_timo_tipomoduloid
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.modu_nombre =null;
$scope.TipoModulo_timo_tipomoduloid =null;
ActualizarContenido();
})}
else
{
var parametros = {method: 'updatemodulos',
modu_nombre: $scope.modu_nombre
,
TipoModulo_timo_tipomoduloid: $scope.TipoModulo_timo_tipomoduloid
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.modu_nombre =null;
$scope.TipoModulo_timo_tipomoduloid =null;
ActualizarContenido();
})
}


}
}
$scope.Editar = function (data)
{
$scope.modu_nombre = data.modu_nombre;
$scope.TipoModulo_timo_tipomoduloid = data.TipoModulo_timo_tipomoduloid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = { method: 'deletemodulos',
TipoModulo_timo_tipomoduloid: data.TipoModulo_timo_tipomoduloid
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
var parametros = {method: 'selectmodulos'}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.modulos = data;
})
.error(function (error)
{
})

}
});
