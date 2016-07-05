<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$modu_nombre = $objDatos->modu_nombre;
$metas = Meta::Insertmodulos($modu_nombre);
if ($metas) {

$datos["estado"] = 1;
$datos["modulos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
