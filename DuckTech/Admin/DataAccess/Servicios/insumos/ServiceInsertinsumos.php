<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$insu_nombre = $objDatos->insu_nombre;
$insu_descripcion = $objDatos->insu_descripcion;
$metas = Meta::Insertinsumos($insu_nombre, $insu_descripcion);
if ($metas) {

$datos["estado"] = 1;
$datos["insumos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
