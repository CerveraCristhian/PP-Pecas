<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$marc_nombre = $objDatos->marc_nombre;
$marc_activo = $objDatos->marc_activo;
$metas = Meta::Insertmarca($marc_nombre, $marc_activo);
if ($metas) {

$datos["estado"] = 1;
$datos["marca"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
