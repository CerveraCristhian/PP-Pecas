<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$direprove_direccionproveedorid = $objDatos->direprove_direccionproveedorid;
$metas = Meta::Deletedireccionproveedor($direprove_direccionproveedorid);
if ($metas) {

$datos["estado"] = 1;
$datos["direccionproveedor"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
