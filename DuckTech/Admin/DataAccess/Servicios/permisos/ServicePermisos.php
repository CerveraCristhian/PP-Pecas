<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosPermisos{

function __construct()
{	
}

public static function SelectPermisos($objDatos)
{
	
	$metas = Meta::SelectAllpermisos();
if ($metas) {

$datos["estado"] = 1;
$datos["permisos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertPermisos($objDatos){
		$objDatos = json_decode(file_get_contents("php://input"));
$perm_nombre = $objDatos->perm_nombre;
$metas = Meta::Insertpermisos($perm_nombre);
if ($metas) {

$datos["estado"] = 1;
$datos["permisos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdatePermisos($objDatos){
		$perm_nombre = $objDatos->perm_nombre;
$perm_permisoid = $objDatos->perm_permisoid;
$metas = Meta::Updatepermisos($perm_nombre, $perm_permisoid);
if ($metas) {

$datos["estado"] = 1;
$datos["permisos"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	DeletePermisos($objDatos){
$perm_permisoid = $objDatos->perm_permisoid;
$metas = Meta::Deletepermisos($perm_permisoid);
if ($metas) {

$datos["estado"] = 1;
$datos["permisos"] = $metas;

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
