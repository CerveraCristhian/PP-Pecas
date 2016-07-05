<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$romo_rolmoduloid = $objDatos->romo_rolmoduloid;
$metas = Meta::Deleterolmodulo($romo_rolmoduloid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolmodulo"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
