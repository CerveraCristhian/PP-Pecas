<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$detoc_detalleordencompraid = $objDatos->detoc_detalleordencompraid;
$metas = Meta::Deletedetallesordencompra($detoc_detalleordencompraid);
if ($metas) {

$datos["estado"] = 1;
$datos["detallesordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
