<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosUsuarios{

function __construct()
{	
}

public static function SelectUsuarios($objDatos)
{
	
	$objDatos = json_decode(file_get_contents("php://input"));
$metas = Meta::SelectAllusuarios();
if ($metas) {

$datos["estado"] = 1;
$datos["usuarios"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertUsuarios($objDatos){
		$user_name = $objDatos->user_name;
$user_password = $objDatos->user_password;
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$metas = Meta::Insertusuarios($user_name, $user_password, $Roles_rol_rolid);
if ($metas) {

$datos["estado"] = 1;
$datos["usuarios"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}


public static function UpdateUsuarios($objDatos){
		$user_name = $objDatos->user_name;
$user_password = $objDatos->user_password;
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$user_usuarioid = $objDatos->user_usuarioid;
$metas = Meta::Updateusuarios($user_name, $user_password, $Roles_rol_rolid, $user_usuarioid);
if ($metas) {

$datos["estado"] = 1;
$datos["usuarios"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	DeleteUsuarios($objDatos){
$user_usuarioid = $objDatos->user_usuarioid;
$metas = Meta::Deleteusuarios($user_usuarioid);
if ($metas) {

$datos["estado"] = 1;
$datos["usuarios"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public	static	function	LoginUsuarios($objDatos){
$user_name = $objDatos->user_name;
$user_password = $objDatos->user_password;
$metas = Meta::LoginUsuario($user_name,$user_password);
if ($metas) {

$datos["estado"] = 1;
$datos["usuarios"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

}


?>
