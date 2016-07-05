<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$contw_contenidowebid = $objDatos->contw_contenidowebid;
$metas = Meta::Deletecontenidoweb($contw_contenidowebid);
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
