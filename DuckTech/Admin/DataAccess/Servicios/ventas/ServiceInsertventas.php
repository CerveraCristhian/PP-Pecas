<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$vent_fecha = $objDatos->vent_fecha;
$vent_subtotal = $objDatos->vent_subtotal;
$vent_iva = $objDatos->vent_iva;
$vent_total = $objDatos->vent_total;
$metas = Meta::Insertventas($vent_fecha, $vent_subtotal, $vent_iva, $vent_total);
if ($metas) {

$datos["estado"] = 1;
$datos["ventas"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
