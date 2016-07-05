<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$detco_cantidad = $objDatos->detco_cantidad;
$detco_precio = $objDatos->detco_precio;
$detco_tipocambio = $objDatos->detco_tipocambio;
$Compras_comp_compraid = $objDatos->Compras_comp_compraid;
$Producto_prod_productoid = $objDatos->Producto_prod_productoid;
$Producto_SubCategoria_subc_subcategoriaid = $objDatos->Producto_SubCategoria_subc_subcategoriaid;
$detco_detallecompraid = $objDatos->detco_detallecompraid;
$metas = Meta::Updatedetallecompra($detco_cantidad, $detco_precio, $detco_tipocambio, $Compras_comp_compraid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid, $detco_detallecompraid);
if ($metas) {

$datos["estado"] = 1;
$datos["detallecompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
