var app = angular.module('formasApp', []);
app.controller('formasController', function($scope, $http) {
    $scope.form_nombre = null;
    $scope.form_archivo = null;
    $scope.TipoForma_tifo_tipoformaid = null;
    $scope.Modulos_modu_moduloid = null;
    $scope.Modulos_TipoModulo_timo_tipomoduloid = null;
    $scope.form_formaid = null;
    $scope.formas = [];
    ActualizarContenido();
    $scope.Guardar = function() {
        if (true) {

            if ($scope.form_formaid == null) {
                var parametros = {
                    method: 'insertformas',
                    form_nombre: $scope.form_nombre,
                    form_archivo: $scope.form_archivo,
                    TipoForma_tifo_tipoformaid: $scope.TipoForma_tifo_tipoformaid,
                    Modulos_modu_moduloid: $scope.Modulos_modu_moduloid,
                    Modulos_TipoModulo_timo_tipomoduloid: $scope.Modulos_TipoModulo_timo_tipomoduloid,
                    form_formaid: $scope.form_formaid
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
                        $scope.form_nombre = null;
                        $scope.form_archivo = null;
                        $scope.TipoForma_tifo_tipoformaid = null;
                        $scope.Modulos_modu_moduloid = null;
                        $scope.Modulos_TipoModulo_timo_tipomoduloid = null;
                        $scope.form_formaid = null;
                        ActualizarContenido();
                    })
            } else {
                var parametros = {
                    method: 'updateformas',
                    form_nombre: $scope.form_nombre,
                    form_archivo: $scope.form_archivo,
                    TipoForma_tifo_tipoformaid: $scope.TipoForma_tifo_tipoformaid,
                    Modulos_modu_moduloid: $scope.Modulos_modu_moduloid,
                    Modulos_TipoModulo_timo_tipomoduloid: $scope.Modulos_TipoModulo_timo_tipomoduloid,
                    form_formaid: $scope.form_formaid
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
                        $scope.form_nombre = null;
                        $scope.form_archivo = null;
                        $scope.TipoForma_tifo_tipoformaid = null;
                        $scope.Modulos_modu_moduloid = null;
                        $scope.Modulos_TipoModulo_timo_tipomoduloid = null;
                        $scope.form_formaid = null;
                        ActualizarContenido();
                    })
            }


        }
    }
    $scope.Editar = function(data) {
        $scope.form_nombre = data.form_nombre;
        $scope.form_archivo = data.form_archivo;
        $scope.TipoForma_tifo_tipoformaid = data.TipoForma_tifo_tipoformaid;
        $scope.Modulos_modu_moduloid = data.Modulos_modu_moduloid;
        $scope.Modulos_TipoModulo_timo_tipomoduloid = data.Modulos_TipoModulo_timo_tipomoduloid;
        $scope.form_formaid = data.form_formaid;
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
                method: 'deleteformas',
                form_formaid: data.form_formaid
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
            method: 'selectformas'
        }
        $http.post("../../Commun/commun.php", parametros)
            .success(function(data) {
                $scope.formas = data;
            })
            .error(function(error) {})

    }
});