var app = angular.module('productoApp', ['directivas']);
app.controller('productoController', function($scope, $http) {
    $scope.prod_nombre = null;
    $scope.prod_precioestandar = null;
    $scope.prod_preciolista = null;
    $scope.prod_garantia = null;
    $scope.prod_tamano = null;
    $scope.prod_stock = null;
    $scope.prod_imagen = null;
    $scope.prod_activo = null;
    $scope.prod_fechacreacion = null;
    $scope.prod_fechamodificacion = null;
    $scope.prod_usuariocreacion = null;
    $scope.prod_usuariomodificacion = null;
    $scope.prod_costo = null;
    $scope.prod_margen = null;
    $scope.Medida_medi_medidaid = null;
    $scope.Colores_colo_colorid = null;
    $scope.Calidad_cali_calidadid = null;
    $scope.Marca_marc_marcaid = null;
    $scope.Moneda_mone_monedaid = null;
    $scope.SubCategoria_subc_subcategoriaid = null;
    $scope.producto = [];
ActualizarContenido();
    //Categoria
    var parametros = {
        method : 'selectCategoria'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.categoria = data;
        })
        .error(function(error) {})

    //Medida
    var parametros = {
        method : 'selectMedida'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.medida = data;
        })
        .error(function(error) {})
    //Colores 
    var parametros = {
        method : 'selectColores'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.colores = data;
        })
        .error(function(error) {})
    //Calidad
    var parametros = {
        method : 'selectCalidad'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.calidad = data;
        })
        .error(function(error) {})

    //Moneda
    var parametros = {
        method : 'selectMoneda'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.moneda = data;
        })
        .error(function(error) {})

    //Marca
    var parametros = {
        method : 'selectMarcas'
    }
    $http.post("../../Commun/commun.php",parametros)
        .success(function(data) {
            $scope.marca = data;
        })
        .error(function(error) {})

    //Eventos
    $scope.Guardar = function() {
        if (true) {

            if ($scope.SubCategoria_subc_subcategoriaid == null) {
                var parametros = {
                    prod_nombre: $scope.prod_nombre,
                    prod_precioestandar: $scope.prod_precioestandar,
                    prod_preciolista: $scope.prod_preciolista,
                    prod_garantia: $scope.prod_garantia,
                    prod_tamano: $scope.prod_tamano,
                    prod_stock: $scope.prod_stock,
                    prod_imagen: $scope.prod_imagen,
                    prod_activo: $scope.prod_activo,
                    prod_fechacreacion: $scope.prod_fechacreacion,
                    prod_fechamodificacion: $scope.prod_fechamodificacion,
                    prod_usuariocreacion: $scope.prod_usuariocreacion,
                    prod_usuariomodificacion: $scope.prod_usuariomodificacion,
                    prod_costo: $scope.prod_costo,
                    prod_margen: $scope.prod_margen,
                    Medida_medi_medidaid: $scope.selectedmedida.medi_medidaid,
                    Colores_colo_colorid: $scope.selectedcolores.colo_colorid,
                    Calidad_cali_calidadid: $scope.selectedcalidad.cali_calidadid,
                    Marca_marc_marcaid: $scope.selectedmarca.marc_marcaid,
                    Moneda_mone_monedaid: $scope.selectedmoneda.mone_monedaid,
                    SubCategoria_subc_subcategoriaid: $scope.selectedsubcategoria.subc_subcategoriaid,
                    prod_descripcion: $scope.prod_descripcion,
                    prod_descripcioningles: $scope.prod_descripcioningles,
                    method:'insertProductos'
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro guardado correctamente!", "success")
                        $scope.prod_nombre = null;
                        $scope.prod_precioestandar = null;
                        $scope.prod_preciolista = null;
                        $scope.prod_garantia = null;
                        $scope.prod_tamano = null;
                        $scope.prod_stock = null;
                        $scope.prod_imagen = null;
                        $scope.prod_activo = null;
                        $scope.prod_fechacreacion = null;
                        $scope.prod_fechamodificacion = null;
                        $scope.prod_usuariocreacion = null;
                        $scope.prod_usuariomodificacion = null;
                        $scope.prod_costo = null;
                        $scope.prod_margen = null;
                        $scope.Medida_medi_medidaid = null;
                        $scope.Colores_colo_colorid = null;
                        $scope.Calidad_cali_calidadid = null;
                        $scope.Marca_marc_marcaid = null;
                        $scope.Moneda_mone_monedaid = null;
                        $scope.SubCategoria_subc_subcategoriaid = null;
                        $scope.prod_descripcion = null;
                        $scope.prod_descripcioningles = null;
                        $http.post("../../DataAccess/Servicios/producto/ServiceSelectAllproducto.php")
                            .success(function(data) {
                                $scope.producto = data;
                            })

                    })
                    .error(function(error) {

                    })
            } else {
                var parametros = {
                    prod_nombre: $scope.prod_nombre,
                    prod_precioestandar: $scope.prod_precioestandar,
                    prod_preciolista: $scope.prod_preciolista,
                    prod_garantia: $scope.prod_garantia,
                    prod_tamano: $scope.prod_tamano,
                    prod_stock: $scope.prod_stock,
                    prod_imagen: $scope.prod_imagen,
                    prod_activo: $scope.prod_activo,
                    prod_fechacreacion: $scope.prod_fechacreacion,
                    prod_fechamodificacion: $scope.prod_fechamodificacion,
                    prod_usuariocreacion: $scope.prod_usuariocreacion,
                    prod_usuariomodificacion: $scope.prod_usuariomodificacion,
                    prod_costo: $scope.prod_costo,
                    prod_margen: $scope.prod_margen,
                    Medida_medi_medidaid: $scope.Medida_medi_medidaid,
                    Colores_colo_colorid: $scope.Colores_colo_colorid,
                    Calidad_cali_calidadid: $scope.Calidad_cali_calidadid,
                    Marca_marc_marcaid: $scope.Marca_marc_marcaid,
                    Moneda_mone_monedaid: $scope.Moneda_mone_monedaid,
                    SubCategoria_subc_subcategoriaid: $scope.SubCategoria_subc_subcategoriaid,
                    method:'updateProductos'
                }
                $http.post("../../Commun/commun.php", parametros)
                    .success(function(data) {
                        swal("¡Registro Guardado!", "¡Registro actualizado correctamente!", "success")
                        $scope.prod_nombre = null;
                        $scope.prod_precioestandar = null;
                        $scope.prod_preciolista = null;
                        $scope.prod_garantia = null;
                        $scope.prod_tamano = null;
                        $scope.prod_stock = null;
                        $scope.prod_imagen = null;
                        $scope.prod_activo = null;
                        $scope.prod_fechacreacion = null;
                        $scope.prod_fechamodificacion = null;
                        $scope.prod_usuariocreacion = null;
                        $scope.prod_usuariomodificacion = null;
                        $scope.prod_costo = null;
                        $scope.prod_margen = null;
                        $scope.Medida_medi_medidaid = null;
                        $scope.Colores_colo_colorid = null;
                        $scope.Calidad_cali_calidadid = null;
                        $scope.Marca_marc_marcaid = null;
                        $scope.Moneda_mone_monedaid = null;
                        $scope.SubCategoria_subc_subcategoriaid = null;
                      ActualizarContenido();

                    })

            }
        }
    }
    $scope.Editar = function(data) {
        $scope.prod_nombre = data.prod_nombre;
        $scope.prod_precioestandar = data.prod_precioestandar;
        $scope.prod_preciolista = data.prod_preciolista;
        $scope.prod_garantia = data.prod_garantia;
        $scope.prod_tamano = data.prod_tamano;
        $scope.prod_stock = data.prod_stock;
        $scope.prod_imagen = data.prod_imagen;
        $scope.prod_activo = data.prod_activo;
        $scope.prod_fechacreacion = data.prod_fechacreacion;
        $scope.prod_fechamodificacion = data.prod_fechamodificacion;
        $scope.prod_usuariocreacion = data.prod_usuariocreacion;
        $scope.prod_usuariomodificacion = data.prod_usuariomodificacion;
        $scope.prod_costo = data.prod_costo;
        $scope.prod_margen = data.prod_margen;
        $scope.Medida_medi_medidaid = data.Medida_medi_medidaid;
        $scope.Colores_colo_colorid = data.Colores_colo_colorid;
        $scope.Calidad_cali_calidadid = data.Calidad_cali_calidadid;
        $scope.Marca_marc_marcaid = data.Marca_marc_marcaid;
        $scope.Moneda_mone_monedaid = data.Moneda_mone_monedaid;
        $scope.SubCategoria_subc_subcategoriaid = data.SubCategoria_subc_subcategoriaid;
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
                prod_productoid: data.prod_productoid,
                method:'deleteProductos'
            }
            $http.post("../../Commun/commun.php", parametros)
                .success(function(data) {
                    swal("¡Eliminado!", "¡Registro eliminado correctamente!", "success");
                    ActualizarContenido();
                });

        })




    }

    $scope.OnCategoriaChange = function(data) {

        var parametros = {
                cate_categoriaid: data.cate_categoriaid,
                method:'SelectCategoriabySubCategoria'
            }
            //Subcategoria
        $scope.subcategoria = [];
        $http.post("../../Commun/commun.php", parametros)
            .success(function(data) {
                $scope.subcategoria = data;
            })
            .error(function(error) {})
    }

    //Eventos



    function ActualizarContenido() {
        var parametros = {
            method:'selectProductos'
        }
        $http.post("../../Commun/commun.php",parametros)
            .success(function(data) {
                $scope.producto = data;
            })
            .error(function(error) {})

    }
});