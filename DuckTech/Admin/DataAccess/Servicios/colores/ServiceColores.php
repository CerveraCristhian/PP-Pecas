<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosColores{

function __construct()
{	
}
	/**
	* selectCalidad
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Devuelve el total de las tuplas de la tabla "calidad"
	* Devuelve : Lista de resultados de la consulta
	*/
public static function SelectColores($objDatos)
{
	
	$metas = Meta::SelectAllcolores();
if ($metas) {

$datos["estado"] = 1;
$datos["colores"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertColores($objDatos){
	$colo_nombre = $objDatos->colo_nombre;
$colo_activo = $objDatos->colo_activo;
$metas = Meta::Insertcolores($colo_nombre, $colo_activo);
if ($metas) {

$datos["estado"] = 1;
$datos["colores"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateColores($objDatos){
		$colo_nombre = $objDatos->colo_nombre;
$colo_activo = $objDatos->colo_activo;
$colo_colorid = $objDatos->colo_colorid;
$metas = Meta::Updatecolores($colo_nombre, $colo_activo, $colo_colorid);
if ($metas) {

$datos["estado"] = 1;
$datos["colores"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	DeleteColores($objDatos){
$colo_colorid = $objDatos->colo_colorid;
$metas = Meta::Deletecolores($colo_colorid);
if ($metas) {

$datos["estado"] = 1;
$datos["colores"] = $metas;

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
