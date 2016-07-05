<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$gara_garantiaid = $objDatos->gara_garantiaid;
$metas = Meta::Deletegarantia($gara_garantiaid);
if ($metas) {

$datos["estado"] = 1;
$datos["garantia"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
