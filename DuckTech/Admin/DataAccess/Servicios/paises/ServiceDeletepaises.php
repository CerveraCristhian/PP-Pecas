<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$pais_paisid = $objDatos->pais_paisid;
$metas = Meta::Deletepaises($pais_paisid);
if ($metas) {

$datos["estado"] = 1;
$datos["paises"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
