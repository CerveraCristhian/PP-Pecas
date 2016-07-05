<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$detve_cantidad = $objDatos->detve_cantidad;
$detve_precio = $objDatos->detve_precio;
$detve_tipocambio = $objDatos->detve_tipocambio;
$Ventas_vent_ventaid = $objDatos->Ventas_vent_ventaid;
$Producto_prod_productoid = $objDatos->Producto_prod_productoid;
$Producto_SubCategoria_subc_subcategoriaid = $objDatos->Producto_SubCategoria_subc_subcategoriaid;
$Calidad_cali_calidadid = $objDatos->Calidad_cali_calidadid;
$DetalleGarantia_dega_detallegarantiaid = $objDatos->DetalleGarantia_dega_detallegarantiaid;
$metas = Meta::Insertdetalleventa($detve_cantidad, $detve_precio, $detve_tipocambio, $Ventas_vent_ventaid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid, $Calidad_cali_calidadid, $DetalleGarantia_dega_detallegarantiaid);
if ($metas) {

$datos["estado"] = 1;
$datos["detalleventa"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
