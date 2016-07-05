<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$direclie_calle = $objDatos->direclie_calle;
$direclie_numero = $objDatos->direclie_numero;
$direclie_colonia = $objDatos->direclie_colonia;
$direclie_numeroexterior = $objDatos->direclie_numeroexterior;
$Clientes_clie_clienteid = $objDatos->Clientes_clie_clienteid;
$direclie_direccionclienteid = $objDatos->direclie_direccionclienteid;
$metas = Meta::Updatedireccioncliente($direclie_calle, $direclie_numero, $direclie_colonia, $direclie_numeroexterior, $Clientes_clie_clienteid, $direclie_direccionclienteid);
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
