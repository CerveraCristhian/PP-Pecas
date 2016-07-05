<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$colo_colorid = $objDatos->colo_colorid;
$metas = Meta::Deletecolores($colo_colorid);
if ($metas) {

$datos["estado"] = 1;
$datos["colores"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
