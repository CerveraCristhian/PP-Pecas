<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$cate_nombre = $objDatos->cate_nombre;
$cate_Activo = $objDatos->cate_Activo;
$cate_fechacreacion = $objDatos->cate_fechacreacion;
$cate_fechamodificacion = $objDatos->cate_fechamodificacion;
$cate_usuariocreacion = $objDatos->cate_usuariocreacion;
$cate_usuariomodificacion = $objDatos->cate_usuariomodificacion;
$metas = Meta::Insertcategoria($cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion);
if ($metas) {

$datos["estado"] = 1;
$datos["categoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
