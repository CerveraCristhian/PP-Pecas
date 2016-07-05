var app = angular.module('calidadApp', ['directivas']);

app.controller('calidadController', function($scope, $http) {
    $scope.cali_nombre = null;
    $scope.cali_calidadid = null;
    $scope.calidad = [];
    var parametros = {
        method: 'selectCalidad'
    }
    $http.post("../../Commun/commun.php", parametros)
        .success(function(data) {
            $scope.calidad = data;
        })
        .error(function(error) {})
    $scope.Guardar = function() {
        if (true) {

            if ($scope.cali_calidadid == null) {
                var parametros = {
                    cali_nombre: $scope.cali_nombre,
                    cali_calidadid: $scope.cali_calidadid,
                    method: 'insertCalidad'
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
                        $scope.cali_nombre = null;
                        $scope.cali_calidadid = null;
                        var parametros = {
                            method: 'selectCalidad'
                        }
                        $http.post("../../Commun/commun.php", parametros)
                            .success(function(data) {
                                $scope.calidad = data;
                            })

                    })
                    .error(function(error) {

                    })
            } else {
                var parametros = {
                    cali_nombre: $scope.cali_nombre,
                    cali_calidadid: $scope.cali_calidadid,
                    method: 'updateCalidad'
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
                        $scope.cali_nombre = null;
                        $scope.cali_calidadid = null;
                        var parametros = {
                            method: 'selectCalidad'
                        }
                        $http.post("../../Commun/commun.php", parametros)
                            .success(function(data) {
                                $scope.calidad = data;
                            })

                    })

            }
        }
    }
    $scope.Editar = function(data) {
        $scope.cali_nombre = data.cali_nombre;
        $scope.cali_calidadid = data.cali_calidadid;
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
                cali_calidadid: data.cali_calidadid,
                method: 'deleteCalidad'
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
            method: 'selectCalidad'
        }
        $http.post("../../Commun/commun.php", parametros)
            .success(function(data) {
                $scope.calidad = data;
            })
            .error(function(error) {})

    }
});