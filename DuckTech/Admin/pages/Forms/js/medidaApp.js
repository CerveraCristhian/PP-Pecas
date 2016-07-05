var app = angular.module('medidaApp', ['directivas']);
app.controller('medidaController', function($scope, $http) {
    $scope.medi_nombre = null;
    $scope.medi_activo = null;
    $scope.medi_fechacreacion = null;
    $scope.medi_fechamodificacion = null;
    $scope.medi_usuariocreacion = null;
    $scope.medi_usuariomodificacion = null;
    $scope.medi_medidaid = null;
    $scope.medida = [];
    var parametros = {
        method: 'selectMedida'
    }
    $http.post("../../Commun/commun.php", parametros)
        .success(function(data) {
            $scope.medida = data;
        })
        .error(function(error) {})
    $scope.Guardar = function() {
        if (true) {

            if ($scope.medi_medidaid == null) {
                var parametros = {
                    medi_nombre: $scope.medi_nombre,
                    medi_activo: $scope.medi_activo,
                    medi_fechacreacion: $scope.medi_fechacreacion,
                    medi_fechamodificacion: $scope.medi_fechamodificacion,
                    medi_usuariocreacion: $scope.medi_usuariocreacion,
                    medi_usuariomodificacion: $scope.medi_usuariomodificacion,
                    medi_medidaid: $scope.medi_medidaid,
                    method: 'insertMedida'
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
                        $scope.medi_nombre = null;
                        $scope.medi_activo = null;
                        $scope.medi_fechacreacion = null;
                        $scope.medi_fechamodificacion = null;
                        $scope.medi_usuariocreacion = null;
                        $scope.medi_usuariomodificacion = null;
                        $scope.medi_medidaid = null;
                        var parametros = {
                            method: 'selectMedida'
                        }
                        $http.post("../../Commun/commun.php", parametros)
                            .success(function(data) {
                                $scope.medida = data;
                            })

                    })
                    .error(function(error) {

                    })
            } else {
                var parametros = {
                    medi_nombre: $scope.medi_nombre,
                    medi_activo: $scope.medi_activo,
                    medi_fechacreacion: $scope.medi_fechacreacion,
                    medi_fechamodificacion: $scope.medi_fechamodificacion,
                    medi_usuariocreacion: $scope.medi_usuariocreacion,
                    medi_usuariomodificacion: $scope.medi_usuariomodificacion,
                    medi_medidaid: $scope.medi_medidaid,
                    method: 'updateMedida'
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
                        $scope.medi_nombre = null;
                        $scope.medi_activo = null;
                        $scope.medi_fechacreacion = null;
                        $scope.medi_fechamodificacion = null;
                        $scope.medi_usuariocreacion = null;
                        $scope.medi_usuariomodificacion = null;
                        $scope.medi_medidaid = null;
                        var parametros = {
                            method: 'selectMedida'
                        }
                        $http.post("../../Commun/commun.php", parametros)
                            .success(function(data) {
                                $scope.medida = data;
                            })

                    })

            }
        }
    }
    $scope.Editar = function(data) {
        $scope.medi_nombre = data.medi_nombre;
        $scope.medi_activo = data.medi_activo;
        $scope.medi_fechacreacion = data.medi_fechacreacion;
        $scope.medi_fechamodificacion = data.medi_fechamodificacion;
        $scope.medi_usuariocreacion = data.medi_usuariocreacion;
        $scope.medi_usuariomodificacion = data.medi_usuariomodificacion;
        $scope.medi_medidaid = data.medi_medidaid;
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
                medi_medidaid: data.medi_medidaid,
                method: 'deleteMedida'
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
            method: 'selectMedida'
        }
        $http.post("../../Commun/commun.php", parametros)
            .success(function(data) {
                $scope.medida = data;
            })
            .error(function(error) {})

    }
});