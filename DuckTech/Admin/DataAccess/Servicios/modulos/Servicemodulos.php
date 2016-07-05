<?php
header('Content-type: application/json');
require 'Servicios.php';

class Serviciosmodulos{

function __construct()
{	
}
public static function selectmodulos($objDatos){
$metas = Meta::SelectAllmodulos();
if ($metas) {

$datos["estado"] = 1;
$datos["modulos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}


public static function SelectModulobyRol($objDatos){
$rol_rolid = $objDatos->rol_rolid;	
$metas = Meta::SelectModulobyRol($rol_rolid);
if ($metas) {

$datos["estado"] = 1;
$datos["modulos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}

public static function insertmodulos($objDatos){
$modu_nombre = $objDatos->modu_nombre;
$metas = Meta::Insertmodulos($modu_nombre);
if ($metas) {

$datos["estado"] = 1;
$datos["modulos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function updatemodulos($objDatos){
$modu_moduloid = $objDatos->modu_moduloid;
$TipoModulo_timo_tipomoduloid = $objDatos->TipoModulo_timo_tipomoduloid;
$modu_nombre = $objDatos->modu_nombre;
$metas = Meta::Updatemodulos($modu_nombre, $modu_moduloid, $TipoModulo_timo_tipomoduloid);
if ($metas) {

$datos["estado"] = 1;
$datos["modulos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function deletemodulos($objDatos){
$modu_moduloid = $objDatos->modu_moduloid;
$TipoModulo_timo_tipomoduloid = $objDatos->TipoModulo_timo_tipomoduloid;
$metas = Meta::Deletemodulos($modu_moduloid, $TipoModulo_timo_tipomoduloid);
if ($metas) {

$datos["estado"] = 1;
$datos["modulos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
}
