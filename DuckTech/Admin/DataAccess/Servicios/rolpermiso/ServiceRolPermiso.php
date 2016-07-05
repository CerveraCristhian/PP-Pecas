<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosRolPermisos{

function __construct()
{	
}

public static function SelectRolPermisos($objDatos)
{
	
$metas = Meta::SelectAllrolpermiso();
if ($metas) {

$datos["estado"] = 1;
$datos["rolpermiso"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertRolPermisos($objDatos){
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$Permisos_perm_permisoid = $objDatos->Permisos_perm_permisoid;
$metas = Meta::Insertrolpermiso($Roles_rol_rolid,$Permisos_perm_permisoid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolpermiso"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateRolPermisos($objDatos){
		$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$Permisos_perm_permisoid = $objDatos->Permisos_perm_permisoid;
$metas = Meta::Updaterolpermiso($Roles_rol_rolid, $Permisos_perm_permisoid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolpermiso"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	DeleteRolPermisos($objDatos){
$Permisos_perm_permisoid = $objDatos->Permisos_perm_permisoid;
$metas = Meta::Deleterolpermiso($Permisos_perm_permisoid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolpermiso"] = $metas;

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
