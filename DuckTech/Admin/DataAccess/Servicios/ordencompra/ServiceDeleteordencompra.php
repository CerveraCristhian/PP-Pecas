<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$orco_ordencompraid = $objDatos->orco_ordencompraid;
$metas = Meta::Deleteordencompra($orco_ordencompraid);
if ($metas) {

$datos["estado"] = 1;
$datos["ordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
