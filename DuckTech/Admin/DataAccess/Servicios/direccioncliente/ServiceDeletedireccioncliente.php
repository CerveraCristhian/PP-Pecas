<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$direclie_direccionclienteid = $objDatos->direclie_direccionclienteid;
$metas = Meta::Deletedireccioncliente($direclie_direccionclienteid);
if ($metas) {

$datos["estado"] = 1;
$datos["direccioncliente"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
