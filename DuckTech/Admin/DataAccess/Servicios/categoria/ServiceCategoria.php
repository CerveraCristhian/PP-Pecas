<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosCategoria{

function __construct()
{	
}

public static function SelectCategoria($objDatos)
{
	
	$objDatos = json_decode(file_get_contents("php://input"));
$metas = Meta::SelectAllcategoria();
if ($metas) {

$datos["estado"] = 1;
$datos["categoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertCategoria($objDatos){
$objDatos = json_decode(file_get_contents("php://input"));
$cate_nombre = $objDatos->cate_nombre;
$cate_Activo = $objDatos->cate_Activo;
$cate_fechacreacion = $objDatos->cate_fechacreacion;
$cate_fechamodificacion = $objDatos->cate_fechamodificacion;
$cate_usuariocreacion = $objDatos->cate_usuariocreacion;
$cate_usuariomodificacion = $objDatos->cate_usuariomodificacion;
$metas = Meta::Insertcategoria($cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion);
if ($metas) {

$datos["estado"] = 1;
$datos["categoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateCategoria($objDatos){
		$objDatos = json_decode(file_get_contents("php://input"));
$cate_nombre = $objDatos->cate_nombre;
$cate_Activo = $objDatos->cate_Activo;
$cate_fechacreacion = $objDatos->cate_fechacreacion;
$cate_fechamodificacion = $objDatos->cate_fechamodificacion;
$cate_usuariocreacion = $objDatos->cate_usuariocreacion;
$cate_usuariomodificacion = $objDatos->cate_usuariomodificacion;
$cate_categoriaid = $objDatos->cate_categoriaid;
$metas = Meta::Updatecategoria($cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion, $cate_categoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["categoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	DeleteCategoria($objDatos){
$objDatos = json_decode(file_get_contents("php://input"));
$cate_categoriaid = $objDatos->cate_categoriaid;
$metas = Meta::Deletecategoria($cate_categoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["categoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function CategoriaSubCategoria($objDatos){
$objDatos = json_decode(file_get_contents("php://input"));
$metas = Meta::SelectCategoriaConsubCategoria();
if ($metas) {

$datos["estado"] = 1;
$datos["categoria"] = $metas;

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
