<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$detco_detallecompraid = $objDatos->detco_detallecompraid;
$metas = Meta::Deletedetallecompra($detco_detallecompraid);
if ($metas) {

$datos["estado"] = 1;
$datos["detallecompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
