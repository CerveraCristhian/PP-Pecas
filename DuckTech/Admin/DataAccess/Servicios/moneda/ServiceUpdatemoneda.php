<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$mone_nombre = $objDatos->mone_nombre;
$mone_simbolo = $objDatos->mone_simbolo;
$mone_monedaid = $objDatos->mone_monedaid;
$metas = Meta::Updatemoneda($mone_nombre, $mone_simbolo, $mone_monedaid);
if ($metas) {

$datos["estado"] = 1;
$datos["moneda"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
