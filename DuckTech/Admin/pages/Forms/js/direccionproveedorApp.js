var app = angular.module('direccionproveedorApp', ['directivas']);
app.controller('direccionproveedorController', function($scope, $http) {
$scope.direprove_calle = null;
$scope.direprove_numero = null;
$scope.direprove_colonia = null;
$scope.direprove_numeroexterior = null;
$scope.Proveedor_prov_proveedorid = null;
$scope.direprove_direccionproveedorid = null;
$scope.direccionproveedor = [];
$http.post("../../DataAccess/Servicios/direccionproveedor/ServiceSelectAlldireccionproveedor.php")
.success(function(data) {
$scope.direccionproveedor = data;
})
.error(function(error) {})
$scope.Guardar= function ()
{
if(true)
{
		
if($scope.direprove_direccionproveedorid ==null)
{
var parametros = {
direprove_calle: $scope.direprove_calle
,
direprove_numero: $scope.direprove_numero
,
direprove_colonia: $scope.direprove_colonia
,
direprove_numeroexterior: $scope.direprove_numeroexterior
,
Proveedor_prov_proveedorid: $scope.Proveedor_prov_proveedorid
,
direprove_direccionproveedorid: $scope.direprove_direccionproveedorid
}
$http.post("../../DataAccess/Servicios/direccionproveedor/ServiceInsertdireccionproveedor.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
$scope.direprove_calle =null;
$scope.direprove_numero =null;
$scope.direprove_colonia =null;
$scope.direprove_numeroexterior =null;
$scope.Proveedor_prov_proveedorid =null;
$scope.direprove_direccionproveedorid =null;
$http.post("../../DataAccess/Servicios/direccionproveedor/ServiceSelectAlldireccionproveedor.php")
.success(function (data)
{
$scope.direccionproveedor = data;
})

})
.error(function (error)
{
   					
})
}
else
{
var parametros = {
direprove_calle: $scope.direprove_calle
,
direprove_numero: $scope.direprove_numero
,
direprove_colonia: $scope.direprove_colonia
,
direprove_numeroexterior: $scope.direprove_numeroexterior
,
Proveedor_prov_proveedorid: $scope.Proveedor_prov_proveedorid
,
direprove_direccionproveedorid: $scope.direprove_direccionproveedorid
}
$http.post("../../DataAccess/Servicios/direccionproveedor/ServiceUpdatedireccionproveedor.php",parametros)
.success(function (data)
{
swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
$scope.direprove_calle =null;
$scope.direprove_numero =null;
$scope.direprove_colonia =null;
$scope.direprove_numeroexterior =null;
$scope.Proveedor_prov_proveedorid =null;
$scope.direprove_direccionproveedorid =null;
$http.post("../../DataAccess/Servicios/direccionproveedor/ServiceSelectAlldireccionproveedor.php")
.success(function (data)
{
$scope.direccionproveedor = data;
})

})

}
}
}
$scope.Editar = function (data)
{
$scope.direprove_calle = data.direprove_calle;
$scope.direprove_numero = data.direprove_numero;
$scope.direprove_colonia = data.direprove_colonia;
$scope.direprove_numeroexterior = data.direprove_numeroexterior;
$scope.Proveedor_prov_proveedorid = data.Proveedor_prov_proveedorid;
$scope.direprove_direccionproveedorid = data.direprove_direccionproveedorid;
}
$scope.EliminarSeleccionado = function(data)
{
swal({   title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",   
type: "warning",   showCancelButton: true,   
confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",   
closeOnConfirm: false }, function(){  

var parametros = {
direprove_direccionproveedorid: data.direprove_direccionproveedorid
}
$http.post("../../DataAccess/Servicios/direccionproveedor/ServiceDeletedireccionproveedor.php",parametros)
.success(function (data)
{
swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success"); 
ActualizarContenido();
});

})
                


      
}
function ActualizarContenido(){

$http.post("../../DataAccess/Servicios/direccionproveedor/ServiceSelectAlldireccionproveedor.php")
.success(function (data)
{
$scope.direccionproveedor = data;
})
.error(function (error)
{
})

}
});
