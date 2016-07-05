<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$tifo_tipoformaid = $objDatos->tifo_tipoformaid;
$metas = Meta::Deletetipoforma($tifo_tipoformaid);
if ($metas) {

$datos["estado"] = 1;
$datos["tipoforma"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
