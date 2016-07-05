<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$medi_medidaid = $objDatos->medi_medidaid;
$metas = Meta::Deletemedida($medi_medidaid);
if ($metas) {

$datos["estado"] = 1;
$datos["medida"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
