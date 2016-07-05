var app = angular.module('rolformaApp', ['directivas']);
app.controller('rolformaController', function($scope, $http) {
    $scope.Formas_form_formaid = null;
    $scope.Roles_rol_rolid = null;
    $scope.rofo_rolformaid = null;
    $scope.rolforma = [];
    ActualizarContenido();
    ObtenerRoles();
 
    $scope.Guardar = function() {
        if (true) {

            if ($scope.rofo_rolformaid == null) {
                var parametros = {
                    method: 'insertrolforma',
                    Formas_form_formaid: $scope.Formas_form_formaid.form_formaid,
                    Roles_rol_rolid: $scope.Roles_rol_rolid.rol_rolid,
                    rofo_rolformaid: $scope.rofo_rolformaid
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
                        $scope.Formas_form_formaid = null;
                        $scope.Roles_rol_rolid = null;
                        $scope.rofo_rolformaid = null;
                        ActualizarContenido();
                    })
            } else {
                var parametros = {
                    method: 'updaterolforma',
                    Formas_form_formaid: $scope.Formas_form_formaid,
                    Roles_rol_rolid: $scope.Roles_rol_rolid,
                    rofo_rolformaid: $scope.rofo_rolformaid
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
                        $scope.Formas_form_formaid = null;
                        $scope.Roles_rol_rolid = null;
                        $scope.rofo_rolformaid = null;
                        ActualizarContenido();
                    })
            }


        }
    }
    $scope.Editar = function(data) {
        $scope.Formas_form_formaid = data.Formas_form_formaid;
        $scope.Roles_rol_rolid = data.Roles_rol_rolid;
        $scope.rofo_rolformaid = data.rofo_rolformaid;
    }
    $scope.EliminarSeleccionado = function(data) {
        swal({
            title: "¿Desea eliminar el elemento seleccionado?",
            text: "¡El registro se eliminara permanentemente!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, ¡Eliminar!",
            closeOnConfirm: false
        }, function() {

            var parametros = {
                method: 'deleterolforma',
                rofo_rolformaid: data.rofo_rolformaid
            }
            $http.post("../../Commun/commun.php", parametros)
                .success(function(data) {
                    swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success");
                    ActualizarContenido();
                });

        })




    }

    function ActualizarContenido() {
        var parametros = {
            method: 'selectrolforma'
        }
        $http.post("../../Commun/commun.php", parametros)
            .success(function(data) {
                $scope.rolforma = data;
            })
            .error(function(error) {})

    }

    $scope.ObtenerFormas = function() {
        var parametros = {
            method: 'SelectFormasbyModulo',modu_moduloid:$scope.moduloselected.modu_moduloid
        }
        $http.post("../../Commun/commun.php", parametros)
            .success(function(data) {
                $scope.formas = data;
            })
            .error(function(error) {})

    }


    function ObtenerRoles() {
        var parametros = {
            method: 'selectRoles'
        }
        $http.post("../../Commun/commun.php", parametros)
            .success(function(data) {
                $scope.roles = data;
            })

    }

     $scope.CargarModulos = function(){
var parametros = {method: 'SelectModulobyRol', rol_rolid:$scope.Roles_rol_rolid.rol_rolid}
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