<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosCalidad{

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
public static function SelectAllcalidad($objDatos)
{
	
	$metas = Meta::SelectAllcalidad();
			if ($metas) {
						$datos["estado"] = 1;
						$datos["calidad"] = $metas;
	print json_encode($datos);
		} else {
				print json_encode(array(
						"estado" => 2,
						"mensaje" => "Ha ocurrido un error"
			));
}
}


public static function InsertCalidad($objDatos){
		$cali_nombre = $objDatos->cali_nombre;
		$metas = Meta::Insertcalidad($cali_nombre);
				if ($metas) {

			$datos["estado"] = 1;
			$datos["calidad"] = $metas;
			print json_encode($datos);
		} 
		else {
	print json_encode(array(
	"estado" => 2,
	"mensaje" => "Ha ocurrido un error"
			));
}

}


public static function UpdateCalidad($objDatos){
		$cali_nombre = $objDatos->cali_nombre;
		$cali_calidadid = $objDatos->cali_calidadid;
		$metas = Meta::Updatecalidad($cali_nombre, $cali_calidadid);
				if ($metas) {

						$datos["estado"] = 1;
						$datos["calidad"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	DeleteCalidad($objDatos){
	$cali_calidadid = $objDatos->cali_calidadid;
$metas = Meta::Deletecalidad($cali_calidadid);
if ($metas) {

$datos["estado"] = 1;
$datos["calidad"] = $metas;

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
