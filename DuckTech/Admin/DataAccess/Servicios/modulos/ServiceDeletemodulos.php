<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$TipoModulo_timo_tipomoduloid = $objDatos->TipoModulo_timo_tipomoduloid;
$metas = Meta::Deletemodulos($TipoModulo_timo_tipomoduloid);
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
