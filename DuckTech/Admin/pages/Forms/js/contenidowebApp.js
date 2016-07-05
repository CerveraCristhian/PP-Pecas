var app = angular.module('contenidowebApp', ['directivas']);
app.controller('contenidowebController', function($scope, $http) {
$scope.contw_descripcion = null;
$scope.contw_descripcioningles = null;
$scope.contw_clave = null;
$scope.contw_contenidowebid = null;
$scope.contenidoweb = [];
ActualizarContenido();
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.contw_contenidowebid ==null)
{
var parametros = { method: 'insertcontenidoweb',
contw_descripcion: $scope.contw_descripcion
,
contw_descripcioningles: $scope.contw_descripcioningles
,
contw_clave: $scope.contw_clave
,
contw_contenidowebid: $scope.contw_contenidowebid
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.contw_descripcion =null;
$scope.contw_descripcioningles =null;
$scope.contw_clave =null;
$scope.contw_contenidowebid =null;
ActualizarContenido();
})}
else
{
var parametros = {method: 'updatecontenidoweb',
contw_descripcion: $scope.contw_descripcion
,
contw_descripcioningles: $scope.contw_descripcioningles
,
contw_clave: $scope.contw_clave
,
contw_contenidowebid: $scope.contw_contenidowebid
}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.contw_descripcion =null;
$scope.contw_descripcioningles =null;
$scope.contw_clave =null;
$scope.contw_contenidowebid =null;
ActualizarContenido();
})
}


}
}
$scope.Editar = function (data)
{
$scope.contw_descripcion = data.contw_descripcion;
$scope.contw_descripcioningles = data.contw_descripcioningles;
$scope.contw_clave = data.contw_clave;
$scope.contw_contenidowebid = data.contw_contenidowebid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = { method: 'deletecontenidoweb',
contw_contenidowebid: data.contw_contenidowebid
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
var parametros = {method: 'selectcontenidoweb'}
$http.post("../../Commun/commun.php",parametros)
.success(function (data)
{
$scope.contenidoweb = data;
})
.error(function (error)
{
})

}
});
