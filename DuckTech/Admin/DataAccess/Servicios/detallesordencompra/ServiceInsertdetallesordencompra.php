<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$detoc_ordencompraid = $objDatos->detoc_ordencompraid;
$detoc_productoid = $objDatos->detoc_productoid;
$detoc_preciounitario = $objDatos->detoc_preciounitario;
$detoc_cantidad = $objDatos->detoc_cantidad;
$detoc_total = $objDatos->detoc_total;
$metas = Meta::Insertdetallesordencompra($detoc_ordencompraid, $detoc_productoid, $detoc_preciounitario, $detoc_cantidad, $detoc_total);
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
