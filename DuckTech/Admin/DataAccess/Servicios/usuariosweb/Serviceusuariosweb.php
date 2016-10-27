<?php
header('Content-type: application/json');
require 'Servicios.php';

class Serviciosusuariosweb{

function __construct()
{
}
public static function selectusuariosweb($objDatos){
$metas = Meta::SelectAllusuariosweb();
if ($metas) {

$datos["estado"] = 1;
$datos["usuariosweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function insertusuariosweb($objDatos){
$usrw_nombre = $objDatos->usrw_nombre;
$usrw_password = $objDatos->usrw_password;
$usrw_rolid = $objDatos->usrw_rolid;
$usrw_salt = $objDatos->usrw_salt;
$usrw_activo = $objDatos->usrw_activo;
$usrw_descuento = $objDatos->usrw_descuento;
$Clientes_clie_clienteid = $objDatos->Clientes_clie_clienteid;
$metas = Meta::Insertusuariosweb($usrw_nombre, $usrw_password, $usrw_rolid, $usrw_salt, $usrw_activo, $usrw_descuento, $Clientes_clie_clienteid);
if ($metas) {

$datos["estado"] = 1;
$datos["usuariosweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function updateusuariosweb($objDatos){
$usrw_usuarioid = $objDatos->usrw_usuarioid;
$usrw_nombre = $objDatos->usrw_nombre;
$usrw_password = $objDatos->usrw_password;
$usrw_salt = $objDatos->usrw_salt;
$usrw_activo = $objDatos->usrw_activo;
$usrw_descuento = $objDatos->usrw_descuento;
$Clientes_clie_clienteid = $objDatos->Clientes_clie_clienteid;
$usrw_rolid = $objDatos->usrw_rolid;
$metas = Meta::Updateusuariosweb($usrw_nombre, $usrw_password, $usrw_rolid, $usrw_salt, $usrw_activo, $usrw_descuento, $Clientes_clie_clienteid, $usrw_usuarioid);
if ($metas) {

$datos["estado"] = 1;
$datos["usuariosweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
public static function deleteusuariosweb($objDatos){
$usrw_usuarioid = $objDatos->usrw_usuarioid;
$metas = Meta::Deleteusuariosweb($usrw_usuarioid);
if ($metas) {

$datos["estado"] = 1;
$datos["usuariosweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}
}
