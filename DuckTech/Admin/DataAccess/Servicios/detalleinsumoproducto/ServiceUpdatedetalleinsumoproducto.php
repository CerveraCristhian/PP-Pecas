<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$DetalleVenta_detve_detalleventaid = $objDatos->DetalleVenta_detve_detalleventaid;
$Insumos_insu_insumosid = $objDatos->Insumos_insu_insumosid;
$dein_detalleinsumoproductoid = $objDatos->dein_detalleinsumoproductoid;
$metas = Meta::Updatedetalleinsumoproducto($DetalleVenta_detve_detalleventaid, $Insumos_insu_insumosid, $dein_detalleinsumoproductoid);
if ($metas) {

$datos["estado"] = 1;
$datos["detalleinsumoproducto"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
