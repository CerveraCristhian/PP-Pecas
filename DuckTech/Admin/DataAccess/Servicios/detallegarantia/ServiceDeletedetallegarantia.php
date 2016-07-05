<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$dega_detallegarantiaid = $objDatos->dega_detallegarantiaid;
$metas = Meta::Deletedetallegarantia($dega_detallegarantiaid);
if ($metas) {

$datos["estado"] = 1;
$datos["detallegarantia"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
