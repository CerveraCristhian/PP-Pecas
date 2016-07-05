var app = angular.module('proveedorApp', ['directivas']);
app.controller('proveedorController', function($scope, $http) {
$scope.prov_nombre = null;
$scope.prov_amaterno = null;
$scope.prov_apaterno = null;
$scope.prov_email = null;
$scope.prov_emailrazon = null;
$scope.prov_fechaingresosistema = null;
$scope.prov_razonsocial = null;
$scope.prov_observaciones = null;
$scope.prov_rfc = null;
$scope.prov_fax = null;
$scope.prov_proveedorid = null;
$scope.proveedor = [];
$http.post("../../DataAccess/Servicios/proveedor/ServiceSelectAllproveedor.php")
.success(function(data) {
$scope.proveedor = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.prov_proveedorid ==null)
{
var parametros = {
prov_nombre: $scope.prov_nombre
,
prov_amaterno: $scope.prov_amaterno
,
prov_apaterno: $scope.prov_apaterno
,
prov_email: $scope.prov_email
,
prov_emailrazon: $scope.prov_emailrazon
,
prov_fechaingresosistema: $scope.prov_fechaingresosistema
,
prov_razonsocial: $scope.prov_razonsocial
,
prov_observaciones: $scope.prov_observaciones
,
prov_rfc: $scope.prov_rfc
,
prov_fax: $scope.prov_fax
,
prov_proveedorid: $scope.prov_proveedorid
}
$http.post("../../DataAccess/Servicios/proveedor/ServiceInsertproveedor.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.prov_nombre =null;
$scope.prov_amaterno =null;
$scope.prov_apaterno =null;
$scope.prov_email =null;
$scope.prov_emailrazon =null;
$scope.prov_fechaingresosistema =null;
$scope.prov_razonsocial =null;
$scope.prov_observaciones =null;
$scope.prov_rfc =null;
$scope.prov_fax =null;
$scope.prov_proveedorid =null;
$http.post("../../DataAccess/Servicios/proveedor/ServiceSelectAllproveedor.php")
.success(function (data)
{
$scope.proveedor = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
prov_nombre: $scope.prov_nombre
,
prov_amaterno: $scope.prov_amaterno
,
prov_apaterno: $scope.prov_apaterno
,
prov_email: $scope.prov_email
,
prov_emailrazon: $scope.prov_emailrazon
,
prov_fechaingresosistema: $scope.prov_fechaingresosistema
,
prov_razonsocial: $scope.prov_razonsocial
,
prov_observaciones: $scope.prov_observaciones
,
prov_rfc: $scope.prov_rfc
,
prov_fax: $scope.prov_fax
,
prov_proveedorid: $scope.prov_proveedorid
}
$http.post("../../DataAccess/Servicios/proveedor/ServiceUpdateproveedor.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.prov_nombre =null;
$scope.prov_amaterno =null;
$scope.prov_apaterno =null;
$scope.prov_email =null;
$scope.prov_emailrazon =null;
$scope.prov_fechaingresosistema =null;
$scope.prov_razonsocial =null;
$scope.prov_observaciones =null;
$scope.prov_rfc =null;
$scope.prov_fax =null;
$scope.prov_proveedorid =null;
$http.post("../../DataAccess/Servicios/proveedor/ServiceSelectAllproveedor.php")
.success(function (data)
{
$scope.proveedor = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.prov_nombre = data.prov_nombre;
$scope.prov_amaterno = data.prov_amaterno;
$scope.prov_apaterno = data.prov_apaterno;
$scope.prov_email = data.prov_email;
$scope.prov_emailrazon = data.prov_emailrazon;
$scope.prov_fechaingresosistema = data.prov_fechaingresosistema;
$scope.prov_razonsocial = data.prov_razonsocial;
$scope.prov_observaciones = data.prov_observaciones;
$scope.prov_rfc = data.prov_rfc;
$scope.prov_fax = data.prov_fax;
$scope.prov_proveedorid = data.prov_proveedorid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
prov_proveedorid: data.prov_proveedorid
}
$http.post("../../DataAccess/Servicios/proveedor/ServiceDeleteproveedor.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/proveedor/ServiceSelectAllproveedor.php")
.success(function (data)
{
$scope.proveedor = data;
})
.error(function (error)
{
})

}
});
