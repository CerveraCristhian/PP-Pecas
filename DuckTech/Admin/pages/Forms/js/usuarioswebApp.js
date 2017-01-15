var app = angular.module('usuarioswebApp', ['directivas']);
app.controller('usuarioswebController', function($scope, $http) {
    $scope.usrw_nombre = null;
    $scope.usrw_password = null;
    $scope.usrw_rolid = null;
    $scope.usrw_usuarioid = null;

    $scope.usrw_activo = null;
    $scope.usrw_salt = null;
    $scope.usrw_descuento = null;
    $scope.Clientes_clie_clienteid = null;

    $scope.usuariosweb = [];
    ActualizarContenido();
    $scope.Guardar= function (){
        if(true){
            if($scope.usrw_usuarioid ==null){
                var parametros = {
                    method: 'insertusuariosweb',
                    usrw_nombre: $scope.usrw_nombre,
                    usrw_password: $scope.usrw_password,
                    usrw_rolid: $scope.usrw_rolid,
                    usrw_salt: $scope.usrw_salt,
                    usrw_activo: $scope.usrw_activo,
                    usrw_descuento: $scope.usrw_descuento,
                    Clientes_clie_clienteid:$scope.Clientes_clie_clienteid
                }
                $http.post("../../Commun/commun.php",parametros)
                .success(function (data){
                    swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
                    $scope.usrw_nombre =null;
                    $scope.usrw_password =null;
                    $scope.usrw_rolid =null;
                    $scope.usrw_usuarioid =null;
                    $scope.usrw_activo = null;
                    $scope.usrw_salt = null;
                    $scope.usrw_descuento = null;
                    $scope.Clientes_clie_clienteid = null;
                    ActualizarContenido();
                    alert("Wea");
                })
            }else{
                var parametros = {
                    method: 'updateusuariosweb',
                    usrw_nombre: $scope.usrw_nombre,
                    usrw_password: $scope.usrw_password,
                    usrw_rolid: $scope.usrw_rolid,
                    usrw_salt: $scope.usrw_salt,
                    usrw_activo: $scope.usrw_activo,
                    usrw_descuento: $scope.usrw_descuento,
                    Clientes_clie_clienteid:$scope.Clientes_clie_clienteid,
                    usrw_usuarioid: $scope.usrw_usuarioid
                }
                $http.post("../../Commun/commun.php",parametros)
                .success(function (data){
                    swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
                    $scope.usrw_nombre =null;
                    $scope.usrw_password =null;
                    $scope.usrw_rolid =null;
                    $scope.usrw_usuarioid =null;
                    $scope.usrw_activo = null;
                    $scope.usrw_salt = null;
                    $scope.usrw_descuento = null;
                    $scope.Clientes_clie_clienteid = null;
                    ActualizarContenido();                                       
                })
            }


        }
    }
    $scope.Editar = function (data){
        $scope.usrw_nombre = data.usrw_nombre;
        $scope.usrw_password = data.usrw_password;
        $scope.usrw_rolid = data.usrw_rolid;
        $scope.usrw_activo = data.usrw_activo;
        $scope.usrw_salt = data.usrw_salt;
        $scope.usrw_descuento = data.usrw_descuento;
        $scope.Clientes_clie_clienteid = data.Clientes_clie_clienteid;
        $scope.usrw_usuarioid = data.usrw_usuarioid;
    }
    $scope.EliminarSeleccionado = function(data){
        swal(
            {
                title: "¿Desea eliminar el elemento seleccionado?",   text: "¡El registro se eliminara permanentemente!",
                type: "warning",   showCancelButton: true,
                confirmButtonColor: "#DD6B55",   confirmButtonText: "Si, ¡Eliminar!",
                closeOnConfirm: false
            }, function(){
                var parametros = { method: 'deleteusuariosweb',
                usrw_usuarioid: data.usrw_usuarioid
            }
            $http.post("../../Commun/commun.php",parametros)
            .success(function (data){
                swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success");
                ActualizarContenido();
            });

        })
    }
    function ActualizarContenido(){
        var parametros = {method: 'selectusuariosweb'}
        $http.post("../../Commun/commun.php",parametros)
        .success(function (data){
            $scope.usuariosweb = data;
        })
        .error(function (error){
        })

    }
});
