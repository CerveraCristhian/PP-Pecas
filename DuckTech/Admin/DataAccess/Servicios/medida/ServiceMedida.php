<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosMedida{

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
public static function SelectAllMedida($objDatos)
{
	
$metas = Meta::SelectAllmedida();
if ($metas) {

$datos["estado"] = 1;
$datos["medida"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertMedida($objDatos){
		$medi_nombre = $objDatos->medi_nombre;
$medi_activo = $objDatos->medi_activo;
$medi_fechacreacion = $objDatos->medi_fechacreacion;
$medi_fechamodificacion = $objDatos->medi_fechamodificacion;
$medi_usuariocreacion = $objDatos->medi_usuariocreacion;
$medi_usuariomodificacion = $objDatos->medi_usuariomodificacion;
$metas = Meta::Insertmedida($medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion);
if ($metas) {

$datos["estado"] = 1;
$datos["medida"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateMedida($objDatos){
$medi_nombre = $objDatos->medi_nombre;
$medi_activo = $objDatos->medi_activo;
$medi_fechacreacion = $objDatos->medi_fechacreacion;
$medi_fechamodificacion = $objDatos->medi_fechamodificacion;
$medi_usuariocreacion = $objDatos->medi_usuariocreacion;
$medi_usuariomodificacion = $objDatos->medi_usuariomodificacion;
$medi_medidaid = $objDatos->medi_medidaid;
$metas = Meta::Updatemedida($medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion, $medi_medidaid);
if ($metas) {

$datos["estado"] = 1;
$datos["medida"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}

public	static	function	DeleteMedida($objDatos){
$medi_medidaid = $objDatos->medi_medidaid;
$metas = Meta::Deletemedida($medi_medidaid);
if ($metas) {

$datos["estado"] = 1;
$datos["medida"] = $metas;

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
