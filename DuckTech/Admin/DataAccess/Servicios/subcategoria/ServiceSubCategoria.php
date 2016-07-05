<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosSubCategoria{

function __construct()
{	
}

public static function SelectSubCategoria($objDatos)
{
	
$metas = Meta::SelectAllsubcategoria();
if ($metas) {

$datos["estado"] = 1;
$datos["subcategoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertSubCategoria($objDatos){
$subc_nombre = $objDatos->subc_nombre;
$subc_activo = $objDatos->subc_activo;
$subc_fechacreacion = $objDatos->subc_fechacreacion;
$subc_fechamodificacion = $objDatos->subc_fechamodificacion;
$subc_usuariocreacion = $objDatos->subc_usuariocreacion;
$subc_usuariomodificacion = $objDatos->subc_usuariomodificacion;
$Categoria_cate_categoriaid = $objDatos->Categoria_cate_categoriaid;
$metas = Meta::Insertsubcategoria($subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["subcategoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateSubCategoria($objDatos){
		$subc_nombre = $objDatos->subc_nombre;
$subc_activo = $objDatos->subc_activo;
$subc_fechacreacion = $objDatos->subc_fechacreacion;
$subc_fechamodificacion = $objDatos->subc_fechamodificacion;
$subc_usuariocreacion = $objDatos->subc_usuariocreacion;
$subc_usuariomodificacion = $objDatos->subc_usuariomodificacion;
$Categoria_cate_categoriaid = $objDatos->Categoria_cate_categoriaid;
$subc_subcategoriaid = $objDatos->subc_subcategoriaid;
$metas = Meta::Updatesubcategoria($subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid, $subc_subcategoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["subcategoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	DeleteSubCategoria($objDatos){
$subc_subcategoriaid = $objDatos->subc_subcategoriaid;
$metas = Meta::Deletesubcategoria($subc_subcategoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["subcategoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


}

public	static	function	SelectCategoriabySubCategoria($objDatos){
$cate_categoriaid = $objDatos->cate_categoriaid;
$metas = Meta::SelectCategoriabySubCategoria($cate_categoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["subcategoria"] = $metas;

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
