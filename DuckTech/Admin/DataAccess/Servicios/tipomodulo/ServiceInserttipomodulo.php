<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$timo_nombre = $objDatos->timo_nombre;
$metas = Meta::Inserttipomodulo($timo_nombre);
if ($metas) {

$datos["estado"] = 1;
$datos["tipomodulo"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
