<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$dega_nombre = $objDatos->dega_nombre;
$Garantia_gara_garantiaid = $objDatos->Garantia_gara_garantiaid;
$metas = Meta::Insertdetallegarantia($dega_nombre, $Garantia_gara_garantiaid);
if ($metas) {

$datos["estado"] = 1;
$datos["detallegarantia"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
