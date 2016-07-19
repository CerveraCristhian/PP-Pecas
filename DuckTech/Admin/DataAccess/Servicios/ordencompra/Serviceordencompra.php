<?php
header('Content-type: application/json');
require 'Servicios.php';

class Serviciosordencompra{

function __construct()
{	
}
public static function selectordencompra($objDatos){
$metas = Meta::SelectAllordencompra();
if ($metas) {

$datos["estado"] = 1;
$datos["ordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function insertordencompra($objDatos){
$orco_usuariowebid = $objDatos->orco_usuariowebid;
$orco_total = $objDatos->orco_total;
$orco_fecha = $objDatos->orco_fecha;
$orco_estatus = $objDatos->orco_estatus;
$metas = Meta::Insertordencompra($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus);
if ($metas) {

$datos["estado"] = 1;
$datos["ordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function updateordencompra($objDatos){
$orco_ordencompraid = $objDatos->orco_ordencompraid;
$orco_usuariowebid = $objDatos->orco_usuariowebid;
$orco_total = $objDatos->orco_total;
$orco_fecha = $objDatos->orco_fecha;
$orco_estatus = $objDatos->orco_estatus;
$metas = Meta::Updateordencompra($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus, $orco_ordencompraid);
if ($metas) {

$datos["estado"] = 1;
$datos["ordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function deleteordencompra($objDatos){
$orco_ordencompraid = $objDatos->orco_ordencompraid;
$metas = Meta::Deleteordencompra($orco_ordencompraid);
if ($metas) {

$datos["estado"] = 1;
$datos["ordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
}
