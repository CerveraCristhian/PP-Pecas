var app = angular.module('contenidowebApp', ['directivas']);
app.controller('contenidowebController', function($scope, $http) {
$scope.contw_descripcion = null;
$scope.contw_descripcioningles = null;
$scope.contw_clave = null;
$scope.contw_contenidowebid = null;
$scope.contenidoweb = [];
ActualizarContenido();

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
