<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$contw_descripcion = $objDatos->contw_descripcion;
$contw_descripcioningles = $objDatos->contw_descripcioningles;
$contw_clave = $objDatos->contw_clave;
$metas = Meta::Insertcontenidoweb($contw_descripcion, $contw_descripcioningles, $contw_clave);
if ($metas) {

$datos["estado"] = 1;
$datos["contenidoweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
