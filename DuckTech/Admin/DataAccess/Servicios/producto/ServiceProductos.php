<?php
header('Content-type: application/json');
require 'Servicios.php';

class ServiciosProductos{

function __construct()
{	
}

public static function SelectProductos($objDatos)
{
	
	$metas = Meta::SelectAllproducto();
if ($metas) {

$datos["estado"] = 1;
$datos["producto"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public static function InsertProductos($objDatos){
		$prod_nombre = $objDatos->prod_nombre;
$prod_precioestandar = $objDatos->prod_precioestandar;
$prod_preciolista = $objDatos->prod_preciolista;
$prod_garantia = $objDatos->prod_garantia;
$prod_tamano = $objDatos->prod_tamano;
$prod_stock = $objDatos->prod_stock;
$prod_imagen = $objDatos->prod_imagen;
$prod_activo = $objDatos->prod_activo;
$prod_fechacreacion = $objDatos->prod_fechacreacion;
$prod_fechamodificacion = $objDatos->prod_fechamodificacion;
$prod_usuariocreacion = $objDatos->prod_usuariocreacion;
$prod_usuariomodificacion = $objDatos->prod_usuariomodificacion;
$prod_costo = $objDatos->prod_costo;
$prod_margen = $objDatos->prod_margen;
$Medida_medi_medidaid = $objDatos->Medida_medi_medidaid;
$Colores_colo_colorid = $objDatos->Colores_colo_colorid;
$Calidad_cali_calidadid = $objDatos->Calidad_cali_calidadid;
$Marca_marc_marcaid = $objDatos->Marca_marc_marcaid;
$Moneda_mone_monedaid = $objDatos->Moneda_mone_monedaid;
$SubCategoria_subc_subcategoriaid = $objDatos->SubCategoria_subc_subcategoriaid;
$prod_descripcion = $objDatos->prod_descripcion;
$prod_descripcioningles = $objDatos->prod_descripcioningles;
$metas = Meta::Insertproducto($prod_nombre, $prod_precioestandar, $prod_preciolista, $prod_garantia, $prod_tamano, $prod_stock, $prod_imagen, $prod_activo, $prod_fechacreacion, $prod_fechamodificacion, $prod_usuariocreacion, $prod_usuariomodificacion, $prod_costo, $prod_margen, $Medida_medi_medidaid, $Colores_colo_colorid, $Calidad_cali_calidadid, $Marca_marc_marcaid, $Moneda_mone_monedaid,$SubCategoria_subc_subcategoriaid,$prod_descripcion,$prod_descripcioningles);
if ($metas) {

$datos["estado"] = 1;
$datos["producto"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}

}


public static function UpdateProductos($objDatos){
		$prod_nombre = $objDatos->prod_nombre;
$prod_precioestandar = $objDatos->prod_precioestandar;
$prod_preciolista = $objDatos->prod_preciolista;
$prod_garantia = $objDatos->prod_garantia;
$prod_tamano = $objDatos->prod_tamano;
$prod_stock = $objDatos->prod_stock;
$prod_imagen = $objDatos->prod_imagen;
$prod_activo = $objDatos->prod_activo;
$prod_fechacreacion = $objDatos->prod_fechacreacion;
$prod_fechamodificacion = $objDatos->prod_fechamodificacion;
$prod_usuariocreacion = $objDatos->prod_usuariocreacion;
$prod_usuariomodificacion = $objDatos->prod_usuariomodificacion;
$prod_costo = $objDatos->prod_costo;
$prod_margen = $objDatos->prod_margen;
$Medida_medi_medidaid = $objDatos->Medida_medi_medidaid;
$Colores_colo_colorid = $objDatos->Colores_colo_colorid;
$Calidad_cali_calidadid = $objDatos->Calidad_cali_calidadid;
$Marca_marc_marcaid = $objDatos->Marca_marc_marcaid;
$Moneda_mone_monedaid = $objDatos->Moneda_mone_monedaid;
$SubCategoria_subc_subcategoriaid = $objDatos->SubCategoria_subc_subcategoriaid;
$metas = Meta::Updateproducto($prod_nombre, $prod_precioestandar, $prod_preciolista, $prod_garantia, $prod_tamano, $prod_stock, $prod_imagen, $prod_activo, $prod_fechacreacion, $prod_fechamodificacion, $prod_usuariocreacion, $prod_usuariomodificacion, $prod_costo, $prod_margen, $Medida_medi_medidaid, $Colores_colo_colorid, $Calidad_cali_calidadid, $Marca_marc_marcaid, $Moneda_mone_monedaid, $SubCategoria_subc_subcategoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["producto"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}

public	static	function	DeleteProductos($objDatos){
$prod_productoid = $objDatos->prod_productoid;
$metas = Meta::Deleteproducto($prod_productoid);
if ($metas) {

$datos["estado"] = 1;
$datos["producto"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}
}


public	static	function	SelectAllproductobyCategoria($objDatos){
$Categoria_cate_categoriaid = $objDatos->Categoria_cate_categoriaid;
$metas = Meta::SelectAllproductobyCategoria($Categoria_cate_categoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["producto"] = $metas;

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
