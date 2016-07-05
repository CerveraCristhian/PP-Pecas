var app = angular.module('rolpermisoApp', ['directivas']);
app.controller('rolpermisoController', function($scope, $http) {
    $scope.Roles_rol_rolid = null;
    $scope.Permisos_perm_permisoid = null;
    $scope.rolpermiso = [];
    $scope.isSave = true;
    var parametros ={
        method : 'selectRolPermisos'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.rolpermiso = data;
        })
        .error(function(error) {})

    $scope.permisos = [];
    var parametros = {  
        method:'selectPermisos'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.permisos = data;
        })
        .error(function(error) {})

    $scope.roles = [];
    var parametros={
        method:'selectRoles'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.roles = data;
        })

    $scope.Guardar = function() {
        if (true) {

            if ($scope.isSave) {
                var parametros = {
                    Roles_rol_rolid:$scope.Roles_rol_rolid.rol_rolid,
                    Permisos_perm_permisoid: $scope.Permisos_perm_permisoid.perm_permisoid,
                    method: 'insertRolPermisos'
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
                        $scope.Roles_rol_rolid = null;
                        $scope.Permisos_perm_permisoid = null;
                        var parametros = {
                            method:'selectRolPermisos'
                        }
                        $http.post("../../Commun/commun.php",parametros)
                            .success(function(data) {
                                $scope.rolpermiso = data;
                            })

                    })
                    .error(function(error) {

                    })
            } else {
                var parametros = {
                    Roles_rol_rolid: $scope.Roles_rol_rolid,
                    Permisos_perm_permisoid: $scope.Permisos_perm_permisoid
                }
                $http.post("../../DataAccess/Servicios/rolpermiso/ServiceUpdaterolpermiso.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
                        $scope.Roles_rol_rolid = null;
                        $scope.Permisos_perm_permisoid = null;
                        var parametros = {
                            method:'selectRolPermisos'
                        }
                        $http.post("../../Commun/commun.php",parametros)
                            .success(function(data) {
                                $scope.rolpermiso = data;
                            })

                    })

            }
        }
    }
    $scope.Editar = function(data) {
        $scope.Roles_rol_rolid = data.Roles_rol_rolid;
        $scope.Permisos_perm_permisoid = data.Permisos_perm_permisoid;
        $scope.isSave=false;
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
                Permisos_perm_permisoid: data.Permisos_perm_permisoid
            }
            $http.post("../../DataAccess/Servicios/rolpermiso/ServiceDeleterolpermiso.php", parametros)
                .success(function(data) {
                    swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success");
                    ActualizarContenido();
                });

        })




    }




    function ActualizarContenido() {

        $http.post("../../DataAccess/Servicios/rolpermiso/ServiceSelectAllrolpermiso.php")
            .success(function(data) {
                $scope.rolpermiso = data;
            })
            .error(function(error) {})

    }
});