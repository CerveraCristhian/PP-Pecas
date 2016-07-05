var app = angular.module('rolmoduloApp', ['directivas']);
app.controller('rolmoduloController', function($scope, $http) {
    $scope.Modulos_modu_moduloid = null;
    $scope.Modulos_TipoModulo_timo_tipomoduloid = null;
    $scope.Roles_rol_rolid = null;
    $scope.romo_rolmoduloid = null;
    $scope.rolmodulo = [];
    CargarModulos();
    ObtenerRoles();
    $http.post("../../DataAccess/Servicios/rolmodulo/ServiceSelectAllrolmodulo.php")
        .success(function(data) {
            $scope.rolmodulo = data;
        })
        .error(function(error) {})
    $scope.Guardar = function() {
        if (true) {

            if ($scope.romo_rolmoduloid == null) {
                var parametros = {
                    Modulos_modu_moduloid: $scope.Modulos_modu_moduloid.modu_moduloid,
                    Modulos_TipoModulo_timo_tipomoduloid: 1,
                    Roles_rol_rolid: $scope.Roles_rol_rolid.rol_rolid,
                    romo_rolmoduloid: $scope.romo_rolmoduloid
                }
                $http.post("../../DataAccess/Servicios/rolmodulo/ServiceInsertrolmodulo.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
                        $scope.Modulos_modu_moduloid = null;
                        $scope.Modulos_TipoModulo_timo_tipomoduloid = null;
                        $scope.Roles_rol_rolid = null;
                        $scope.romo_rolmoduloid = null;
                        $http.post("../../DataAccess/Servicios/rolmodulo/ServiceSelectAllrolmodulo.php")
                            .success(function(data) {
                                $scope.rolmodulo = data;
                            })

                    })
                    .error(function(error) {

                    })
            } else {
                var parametros = {
                    Modulos_modu_moduloid: $scope.Modulos_modu_moduloid,
                    Modulos_TipoModulo_timo_tipomoduloid: $scope.Modulos_TipoModulo_timo_tipomoduloid,
                    Roles_rol_rolid: $scope.Roles_rol_rolid,
                    romo_rolmoduloid: $scope.romo_rolmoduloid
                }
                $http.post("../../DataAccess/Servicios/rolmodulo/ServiceUpdaterolmodulo.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
                        $scope.Modulos_modu_moduloid = null;
                        $scope.Modulos_TipoModulo_timo_tipomoduloid = null;
                        $scope.Roles_rol_rolid = null;
                        $scope.romo_rolmoduloid = null;
                        $http.post("../../DataAccess/Servicios/rolmodulo/ServiceSelectAllrolmodulo.php")
                            .success(function(data) {
                                $scope.rolmodulo = data;
                            })

                    })

            }
        }
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
    $scope.Editar = function(data) {
        $scope.Modulos_modu_moduloid = data.Modulos_modu_moduloid;
        $scope.Modulos_TipoModulo_timo_tipomoduloid = data.Modulos_TipoModulo_timo_tipomoduloid;
        $scope.Roles_rol_rolid = data.Roles_rol_rolid;
        $scope.romo_rolmoduloid = data.romo_rolmoduloid;
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
                romo_rolmoduloid: data.romo_rolmoduloid
            }
            $http.post("../../DataAccess/Servicios/rolmodulo/ServiceDeleterolmodulo.php", parametros)
                .success(function(data) {
                    swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success");
                    ActualizarContenido();
                });

        })




    }



    function CargarModulos() {
        var parametros = {
            method: 'selectmodulos'
        }
        $http.post("../../Commun/commun.php", parametros)
            .success(function(data) {
                $scope.modulos = data;
            })
            .error(function(error) {})

    }


    function ActualizarContenido() {

        $http.post("../../DataAccess/Servicios/rolmodulo/ServiceSelectAllrolmodulo.php")
            .success(function(data) {
                $scope.rolmodulo = data;
            })
            .error(function(error) {})

    }
});