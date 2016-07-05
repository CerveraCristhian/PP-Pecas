<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$vent_ventaid = $objDatos->vent_ventaid;
$metas = Meta::Deleteventas($vent_ventaid);
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
