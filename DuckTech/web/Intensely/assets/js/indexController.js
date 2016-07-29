var app = angular.module('contenidowebApp', []);
app.controller('contenidowebController', function($scope, $http) {
    $scope.contw_descripcion = null;
    $scope.contw_descripcioningles = null;
    $scope.contw_clave = null;
    $scope.contw_contenidowebid = null;
    $scope.contenidoweb = [];
    $scope.Mision = null;
    $scope.reg_email= null;
    $scope.reg_pass1 = null;
    var parametros = {
        method: 'selectcontenidoweb'
    }
    $http.post("../../Admin/Commun/commun.php", parametros)
        .success(function(data) {
            $scope.contenidoweb = data;
            $scope.Mision = $scope.contenidoweb.contenidoweb;

        })
        .error(function(error) {});


    $scope.Registro = function() {
      uploadAjax();
      var parametros = {
          usrw_nombre: $scope.reg_email,
          usrw_password: $scope.reg_pass1,
          usrw_rolid: "1",
          method: 'insertusuariosweb'
      }
      $http.post("../../Admin/Commun/commun.php", parametros)
          .success(function(data) {
              swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
          })
          .error(function(error) {})
    }

    function uploadAjax() {
      //alert("up");
        var inputFileImage = document.getElementById("alta");
        var file = inputFileImage.files[0];
        var data = new FormData();

        data.append('archivo', file);
        var url = "upload.php";
        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            cache: false
        }).done(function(data){
        	if(data.ok){
            alert("se subio con exito");
        		console.log("se subio con exito")
        	}else {
        		alert(data.msg)
        	}
        });
    }
});
