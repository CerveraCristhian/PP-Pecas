<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosMarcas{

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
public static function SelectAllMarcas($objDatos)
{
	
$metas = Meta::SelectAllmarca();
if ($metas) {

$datos["estado"] = 1;
$datos["marca"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertMarcas($objDatos){
		$marc_nombre = $objDatos->marc_nombre;
$marc_activo = $objDatos->marc_activo;
$metas = Meta::Insertmarca($marc_nombre, $marc_activo);
if ($metas) {

$datos["estado"] = 1;
$datos["marca"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateMarcas($objDatos){
		$marc_nombre = $objDatos->marc_nombre;
$marc_activo = $objDatos->marc_activo;
$marc_marcaid = $objDatos->marc_marcaid;
$metas = Meta::Updatemarca($marc_nombre, $marc_activo, $marc_marcaid);
if ($metas) {

$datos["estado"] = 1;
$datos["marca"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}

public	static	function	DeleteMarcas($objDatos){
$marc_marcaid = $objDatos->marc_marcaid;
$metas = Meta::Deletemarca($marc_marcaid);
if ($metas) {

$datos["estado"] = 1;
$datos["marca"] = $metas;

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
