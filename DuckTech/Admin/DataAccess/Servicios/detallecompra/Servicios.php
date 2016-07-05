<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
require_once '../../Database.php';

class Meta
{

function __construct()
{
}
public static function Insertdetallecompra($detco_cantidad, $detco_precio, $detco_tipocambio, $Compras_comp_compraid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid)
{
$consulta = "INSERT INTO detallecompra(detco_cantidad, detco_precio, detco_tipocambio, Compras_comp_compraid, Producto_prod_productoid, Producto_SubCategoria_subc_subcategoriaid) values (?, ?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detco_cantidad, $detco_precio, $detco_tipocambio, $Compras_comp_compraid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAlldetallecompra()
{
$consulta = "SELECT * FROM detallecompra";
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
public static function Updatedetallecompra($detco_cantidad, $detco_precio, $detco_tipocambio, $Compras_comp_compraid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid,$detco_detallecompraid)
{
$consulta = "UPDATE detallecompra SET detco_cantidad=?, detco_precio=?, detco_tipocambio=?, Compras_comp_compraid=?, Producto_prod_productoid=?, Producto_SubCategoria_subc_subcategoriaid=? where detco_detallecompraid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detco_cantidad, $detco_precio, $detco_tipocambio, $Compras_comp_compraid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid,$detco_detallecompraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletedetallecompra($detco_detallecompraid)
{
$consulta = "DELETE FROM detallecompra where detco_detallecompraid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detco_detallecompraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
