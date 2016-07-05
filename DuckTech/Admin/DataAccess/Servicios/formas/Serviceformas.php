<?php
header('Content-type: application/json');
require 'Servicios.php';

class Serviciosformas{

function __construct()
{	
}
public static function selectformas($objDatos){
$metas = Meta::SelectAllformas();
if ($metas) {

$datos["estado"] = 1;
$datos["formas"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}

public static function SelectFormasbyModulo($objDatos){
$modu_moduloid = $objDatos->modu_moduloid;	
$metas = Meta::SelectFormasbyModulo($modu_moduloid);
if ($metas) {

$datos["estado"] = 1;
$datos["formas"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}


public static function insertformas($objDatos){
$form_nombre = $objDatos->form_nombre;
$form_archivo = $objDatos->form_archivo;
$TipoForma_tifo_tipoformaid = $objDatos->TipoForma_tifo_tipoformaid;
$Modulos_modu_moduloid = $objDatos->Modulos_modu_moduloid;
$Modulos_TipoModulo_timo_tipomoduloid = $objDatos->Modulos_TipoModulo_timo_tipomoduloid;
$metas = Meta::Insertformas($form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid);
if ($metas) {

$datos["estado"] = 1;
$datos["formas"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function updateformas($objDatos){
$form_formaid = $objDatos->form_formaid;
$form_nombre = $objDatos->form_nombre;
$form_archivo = $objDatos->form_archivo;
$TipoForma_tifo_tipoformaid = $objDatos->TipoForma_tifo_tipoformaid;
$Modulos_modu_moduloid = $objDatos->Modulos_modu_moduloid;
$Modulos_TipoModulo_timo_tipomoduloid = $objDatos->Modulos_TipoModulo_timo_tipomoduloid;
$metas = Meta::Updateformas($form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid, $form_formaid);
if ($metas) {

$datos["estado"] = 1;
$datos["formas"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function deleteformas($objDatos){
$form_formaid = $objDatos->form_formaid;
$metas = Meta::Deleteformas($form_formaid);
if ($metas) {

$datos["estado"] = 1;
$datos["formas"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
}
