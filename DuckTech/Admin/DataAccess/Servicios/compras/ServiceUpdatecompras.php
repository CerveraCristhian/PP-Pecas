<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$comp_fecha = $objDatos->comp_fecha;
$comp_subtotal = $objDatos->comp_subtotal;
$comp_iva = $objDatos->comp_iva;
$comp_total = $objDatos->comp_total;
$comp_compraid = $objDatos->comp_compraid;
$metas = Meta::Updatecompras($comp_fecha, $comp_subtotal, $comp_iva, $comp_total, $comp_compraid);
if ($metas) {

$datos["estado"] = 1;
$datos["compras"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
