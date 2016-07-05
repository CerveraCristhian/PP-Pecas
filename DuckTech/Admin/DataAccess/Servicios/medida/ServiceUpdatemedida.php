<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$medi_nombre = $objDatos->medi_nombre;
$medi_activo = $objDatos->medi_activo;
$medi_fechacreacion = $objDatos->medi_fechacreacion;
$medi_fechamodificacion = $objDatos->medi_fechamodificacion;
$medi_usuariocreacion = $objDatos->medi_usuariocreacion;
$medi_usuariomodificacion = $objDatos->medi_usuariomodificacion;
$medi_medidaid = $objDatos->medi_medidaid;
$metas = Meta::Updatemedida($medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion, $medi_medidaid);
if ($metas) {

$datos["estado"] = 1;
$datos["medida"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
