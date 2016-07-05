<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosRolesForma{

function __construct()
{	
}

public static function SelectRolesForma($objDatos)
{
	
	$metas = Meta::SelectAllrolforma();
if ($metas) {

$datos["estado"] = 1;
$datos["rolforma"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function InsertRolesForma($objDatos){
$Formas_form_formaid = $objDatos->Formas_form_formaid;
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$metas = Meta::Insertrolforma($Formas_form_formaid, $Roles_rol_rolid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolforma"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateRolesForma($objDatos){
		$Formas_form_formaid = $objDatos->Formas_form_formaid;
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$rofo_rolformaid = $objDatos->rofo_rolformaid;
$metas = Meta::Updaterolforma($Formas_form_formaid, $Roles_rol_rolid, $rofo_rolformaid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolforma"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}

public	static	function	DeleteRolesForma($objDatos){
$rofo_rolformaid = $objDatos->rofo_rolformaid;
$metas = Meta::Deleterolforma($rofo_rolformaid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolforma"] = $metas;

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
