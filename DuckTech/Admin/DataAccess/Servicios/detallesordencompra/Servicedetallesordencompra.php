<?php
header('Content-type: application/json');
require 'Servicios.php';

class Serviciosdetallesordencompra{

function __construct()
{	
}
public static function selectdetallesordencompra($objDatos){
$metas = Meta::SelectAlldetallesordencompra();
if ($metas) {

$datos["estado"] = 1;
$datos["detallesordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function insertdetallesordencompra($objDatos){
$detoc_ordencompraid = $objDatos->detoc_ordencompraid;
$detoc_productoid = $objDatos->detoc_productoid;
$detoc_preciounitario = $objDatos->detoc_preciounitario;
$detoc_cantidad = $objDatos->detoc_cantidad;
$detoc_total = $objDatos->detoc_total;
$metas = Meta::Insertdetallesordencompra($detoc_ordencompraid, $detoc_productoid, $detoc_preciounitario, $detoc_cantidad, $detoc_total);
if ($metas) {

$datos["estado"] = 1;
$datos["detallesordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function updatedetallesordencompra($objDatos){
$detoc_detalleordencompraid = $objDatos->detoc_detalleordencompraid;
$detoc_ordencompraid = $objDatos->detoc_ordencompraid;
$detoc_productoid = $objDatos->detoc_productoid;
$detoc_preciounitario = $objDatos->detoc_preciounitario;
$detoc_cantidad = $objDatos->detoc_cantidad;
$detoc_total = $objDatos->detoc_total;
$metas = Meta::Updatedetallesordencompra($detoc_ordencompraid, $detoc_productoid, $detoc_preciounitario, $detoc_cantidad, $detoc_total, $detoc_detalleordencompraid);
if ($metas) {

$datos["estado"] = 1;
$datos["detallesordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function deletedetallesordencompra($objDatos){
$detoc_detalleordencompraid = $objDatos->detoc_detalleordencompraid;
$metas = Meta::Deletedetallesordencompra($detoc_detalleordencompraid);
if ($metas) {

$datos["estado"] = 1;
$datos["detallesordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
}
