<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$esta_estadoid = $objDatos->esta_estadoid;
$metas = Meta::Deleteestado($esta_estadoid);
if ($metas) {

$datos["estado"] = 1;
$datos["estado"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
