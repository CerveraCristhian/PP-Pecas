<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$cali_calidadid = $objDatos->cali_calidadid;
$metas = Meta::Deletecalidad($cali_calidadid);
if ($metas) {

$datos["estado"] = 1;
$datos["calidad"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
