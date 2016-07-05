<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$rol_nombre = $objDatos->rol_nombre;
$metas = Meta::Insertroles($rol_nombre);
if ($metas) {

$datos["estado"] = 1;
$datos["roles"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
