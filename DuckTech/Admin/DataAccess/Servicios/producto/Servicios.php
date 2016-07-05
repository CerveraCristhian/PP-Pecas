<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
define('DS',DIRECTORY_SEPARATOR);
require_once $_SERVER["DOCUMENT_ROOT"].'/'.'Git/testCom/DuckTech/Admin/DataAccess/Database.php';

class Meta
{

function __construct()
{
}
public static function Insertproducto($prod_nombre, $prod_precioestandar, $prod_preciolista, $prod_garantia, $prod_tamano, $prod_stock, $prod_imagen, $prod_activo, $prod_fechacreacion, $prod_fechamodificacion, $prod_usuariocreacion, $prod_usuariomodificacion, $prod_costo, $prod_margen, $Medida_medi_medidaid, $Colores_colo_colorid, $Calidad_cali_calidadid, $Marca_marc_marcaid, $Moneda_mone_monedaid,$SubCategoria_subc_subcategoriaid,$prod_descripcion,$prod_descripcioningles)
{
$consulta = "INSERT INTO producto(prod_nombre, prod_precioestandar, prod_preciolista, prod_garantia, prod_tamano, prod_stock, prod_imagen, prod_activo, prod_fechacreacion, prod_fechamodificacion, prod_usuariocreacion, prod_usuariomodificacion, prod_costo, prod_margen, Medida_medi_medidaid, Colores_colo_colorid, Calidad_cali_calidadid, Marca_marc_marcaid, Moneda_mone_monedaid,SubCategoria_subc_subcategoriaid,prod_descripcion,prod_descripcioningles) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($prod_nombre, $prod_precioestandar, $prod_preciolista, $prod_garantia, $prod_tamano, $prod_stock, $prod_imagen, $prod_activo, $prod_fechacreacion, $prod_fechamodificacion, $prod_usuariocreacion, $prod_usuariomodificacion, $prod_costo, $prod_margen, $Medida_medi_medidaid, $Colores_colo_colorid, $Calidad_cali_calidadid, $Marca_marc_marcaid, $Moneda_mone_monedaid,$SubCategoria_subc_subcategoriaid,$prod_descripcion,$prod_descripcioningles));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return $e;
}
}
public static function SelectAllproducto()
{
$consulta = "select * from producto as a join subcategoria as b on a.SubCategoria_subc_subcategoriaid = b.subc_subcategoriaid join  moneda as c on a.Moneda_mone_monedaid = c.mone_monedaid join Medida as d on a.Medida_medi_medidaid=d.medi_medidaid join Colores as e on a.Colores_colo_colorid=e.colo_colorid join Marca as f on a.Marca_marc_marcaid = f.marc_marcaid join calidad as g on a.Calidad_cali_calidadid=g.cali_calidadid";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute();
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}


//categoria

public static function SelectAllproductobyCategoria($categoriaid)
{
$consulta = "select * from producto as a join subcategoria as b on a.SubCategoria_subc_subcategoriaid = b.subc_subcategoriaid join  moneda as c on a.Moneda_mone_monedaid = c.mone_monedaid join Medida as d on a.Medida_medi_medidaid=d.medi_medidaid join Colores as e on a.Colores_colo_colorid=e.colo_colorid join Marca as f on a.Marca_marc_marcaid = f.marc_marcaid join calidad as g on a.Calidad_cali_calidadid=g.cali_calidadid where a.SubCategoria_subc_subcategoriaid=?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($categoriaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}



public static function SelectProductoByID($productoid)
{
$consulta = "select * from producto as a join subcategoria as b on a.SubCategoria_subc_subcategoriaid = b.subc_subcategoriaid join  moneda as c on a.Moneda_mone_monedaid = c.mone_monedaid join Medida as d on a.Medida_medi_medidaid=d.medi_medidaid join Colores as e on a.Colores_colo_colorid=e.colo_colorid join Marca as f on a.Marca_marc_marcaid = f.marc_marcaid join calidad as g on a.Calidad_cali_calidadid=g.cali_calidadid where a.prod_productoid=?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($productoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}



public static function Updateproducto($prod_nombre, $prod_precioestandar, $prod_preciolista, $prod_garantia, $prod_tamano, $prod_stock, $prod_imagen, $prod_activo, $prod_fechacreacion, $prod_fechamodificacion, $prod_usuariocreacion, $prod_usuariomodificacion, $prod_costo, $prod_margen, $Medida_medi_medidaid, $Colores_colo_colorid, $Calidad_cali_calidadid, $Marca_marc_marcaid, $Moneda_mone_monedaid,$SubCategoria_subc_subcategoriaid)
{
$consulta = "UPDATE producto SET prod_nombre=?, prod_precioestandar=?, prod_preciolista=?, prod_garantia=?, prod_tamano=?, prod_stock=?, prod_imagen=?, prod_activo=?, prod_fechacreacion=?, prod_fechamodificacion=?, prod_usuariocreacion=?, prod_usuariomodificacion=?, prod_costo=?, prod_margen=?, Medida_medi_medidaid=?, Colores_colo_colorid=?, Calidad_cali_calidadid=?, Marca_marc_marcaid=?, Moneda_mone_monedaid=? where SubCategoria_subc_subcategoriaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($prod_nombre, $prod_precioestandar, $prod_preciolista, $prod_garantia, $prod_tamano, $prod_stock, $prod_imagen, $prod_activo, $prod_fechacreacion, $prod_fechamodificacion, $prod_usuariocreacion, $prod_usuariomodificacion, $prod_costo, $prod_margen, $Medida_medi_medidaid, $Colores_colo_colorid, $Calidad_cali_calidadid, $Marca_marc_marcaid, $Moneda_mone_monedaid,$SubCategoria_subc_subcategoriaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteproducto($prod_productoid)
{
$consulta = "DELETE FROM producto where prod_productoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($prod_productoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
