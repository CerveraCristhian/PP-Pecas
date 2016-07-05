<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosMoneda{

function __construct()
{	
}

public static function SelectMoneda($objDatos)
{
	
$metas = Meta::SelectAllmoneda();
if ($metas) {

$datos["estado"] = 1;
$datos["moneda"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function InsertMoneda($objDatos){
		$mone_nombre = $objDatos->mone_nombre;
$mone_simbolo = $objDatos->mone_simbolo;
$metas = Meta::Insertmoneda($mone_nombre, $mone_simbolo);
if ($metas) {

$datos["estado"] = 1;
$datos["moneda"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateMoneda($objDatos){
$mone_nombre = $objDatos->mone_nombre;
$mone_simbolo = $objDatos->mone_simbolo;
$mone_monedaid = $objDatos->mone_monedaid;
$metas = Meta::Updatemoneda($mone_nombre, $mone_simbolo, $mone_monedaid);
if ($metas) {

$datos["estado"] = 1;
$datos["moneda"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}

public	static	function	DeleteMoneda($objDatos){
$mone_monedaid = $objDatos->mone_monedaid;
$metas = Meta::Deletemoneda($mone_monedaid);
if ($metas) {

$datos["estado"] = 1;
$datos["moneda"] = $metas;

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
