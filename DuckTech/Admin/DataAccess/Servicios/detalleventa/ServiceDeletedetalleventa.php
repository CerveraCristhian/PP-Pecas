<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$detve_detalleventaid = $objDatos->detve_detalleventaid;
$metas = Meta::Deletedetalleventa($detve_detalleventaid);
if ($metas) {

$datos["estado"] = 1;
$datos["detalleventa"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
