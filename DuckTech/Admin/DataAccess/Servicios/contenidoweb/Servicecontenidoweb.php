<?php
header('Content-type: application/json');
require 'Servicios.php';

class Servicioscontenidoweb{

function __construct()
{	
}
public static function selectcontenidoweb($objDatos){
$metas = Meta::SelectAllcontenidoweb();
if ($metas) {

$datos["estado"] = 1;
$datos["contenidoweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function insertcontenidoweb($objDatos){
$contw_descripcion = $objDatos->contw_descripcion;
$contw_descripcioningles = $objDatos->contw_descripcioningles;
$contw_clave = $objDatos->contw_clave;
$metas = Meta::Insertcontenidoweb($contw_descripcion, $contw_descripcioningles, $contw_clave);
if ($metas) {

$datos["estado"] = 1;
$datos["contenidoweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function updatecontenidoweb($objDatos){
$contw_contenidowebid = $objDatos->contw_contenidowebid;
$contw_descripcion = $objDatos->contw_descripcion;
$contw_descripcioningles = $objDatos->contw_descripcioningles;
$contw_clave = $objDatos->contw_clave;
$metas = Meta::Updatecontenidoweb($contw_descripcion, $contw_descripcioningles, $contw_clave, $contw_contenidowebid);
if ($metas) {

$datos["estado"] = 1;
$datos["contenidoweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function deletecontenidoweb($objDatos){
$contw_contenidowebid = $objDatos->contw_contenidowebid;
$metas = Meta::Deletecontenidoweb($contw_contenidowebid);
if ($metas) {

$datos["estado"] = 1;
$datos["contenidoweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
}
