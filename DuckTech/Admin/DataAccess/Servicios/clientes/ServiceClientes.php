<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosClientes{

function __construct()
{	
}
	/**
	* selectclientes
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Devuelve el total de las tuplas de la tabla "clientes"
	* Devuelve : Lista de resultados de la consulta
	*/
public static function SelectAllclientes($objDatos)
{
	
	$metas = Meta::SelectAllclientes();
if ($metas) {

$datos["estado"] = 1;
$datos["clientes"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function Insertclientes($objDatos){
		$clie_nombre = $objDatos->clie_nombre;
$clie_amaterno = $objDatos->clie_amaterno;
$clie_apaterno = $objDatos->clie_apaterno;
$clie_email = $objDatos->clie_email;
$clie_emailrazon = $objDatos->clie_emailrazon;
$clie_fechaingresosistema = $objDatos->clie_fechaingresosistema;
$clie_razonsocial = $objDatos->clie_razonsocial;
$clie_observaciones = $objDatos->clie_observaciones;
$clie_rfc = $objDatos->clie_rfc;
$clie_fax = $objDatos->clie_fax;
$metas = Meta::Insertclientes($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax);
if ($metas) {

$datos["estado"] = 1;
$datos["clientes"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function Updateclientes($objDatos){
		$clie_nombre = $objDatos->clie_nombre;
$clie_amaterno = $objDatos->clie_amaterno;
$clie_apaterno = $objDatos->clie_apaterno;
$clie_email = $objDatos->clie_email;
$clie_emailrazon = $objDatos->clie_emailrazon;
$clie_fechaingresosistema = $objDatos->clie_fechaingresosistema;
$clie_razonsocial = $objDatos->clie_razonsocial;
$clie_observaciones = $objDatos->clie_observaciones;
$clie_rfc = $objDatos->clie_rfc;
$clie_fax = $objDatos->clie_fax;
$clie_clienteid = $objDatos->clie_clienteid;
$metas = Meta::Updateclientes($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax, $clie_clienteid);
if ($metas) {

$datos["estado"] = 1;
$datos["clientes"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	Deleteclientes($objDatos){
$clie_clienteid = $objDatos->clie_clienteid;
$metas = Meta::Deleteclientes($clie_clienteid);
if ($metas) {

$datos["estado"] = 1;
$datos["clientes"] = $metas;

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
