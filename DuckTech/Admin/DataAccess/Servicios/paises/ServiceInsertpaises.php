<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$pais_nombre = $objDatos->pais_nombre;
$metas = Meta::Insertpaises($pais_nombre);
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
