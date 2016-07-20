var app = angular.module('contenidowebApp', []);
app.controller('contenidowebController', function($scope, $http) {
$scope.contw_descripcion = null;
$scope.contw_descripcioningles = null;
$scope.contw_clave = null;
$scope.contw_contenidowebid = null;
$scope.contenidoweb = [];
$scope.Mision = null;
ActualizarContenido();

function ActualizarContenido(){
var parametros = {method: 'selectcontenidoweb'}
$http.post("../../Admin/Commun/commun.php",parametros)
.success(function (data)
{
$scope.contenidoweb = data;
$scope.Mision = $scope.contenidoweb.contenidoweb[0].contw_descripcion;

})
.error(function (error)
{
})

}
});
