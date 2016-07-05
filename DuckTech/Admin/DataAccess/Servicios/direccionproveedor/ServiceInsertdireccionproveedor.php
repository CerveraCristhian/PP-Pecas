<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$direprove_calle = $objDatos->direprove_calle;
$direprove_numero = $objDatos->direprove_numero;
$direprove_colonia = $objDatos->direprove_colonia;
$direprove_numeroexterior = $objDatos->direprove_numeroexterior;
$Proveedor_prov_proveedorid = $objDatos->Proveedor_prov_proveedorid;
$metas = Meta::Insertdireccionproveedor($direprove_calle, $direprove_numero, $direprove_colonia, $direprove_numeroexterior, $Proveedor_prov_proveedorid);
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
