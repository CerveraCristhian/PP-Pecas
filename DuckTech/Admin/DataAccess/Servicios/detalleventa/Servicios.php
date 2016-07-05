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
public static function Insertdetalleventa($detve_cantidad, $detve_precio, $detve_tipocambio, $Ventas_vent_ventaid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid, $Calidad_cali_calidadid, $DetalleGarantia_dega_detallegarantiaid)
{
$consulta = "INSERT INTO detalleventa(detve_cantidad, detve_precio, detve_tipocambio, Ventas_vent_ventaid, Producto_prod_productoid, Producto_SubCategoria_subc_subcategoriaid, Calidad_cali_calidadid, DetalleGarantia_dega_detallegarantiaid) values (?, ?, ?, ?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detve_cantidad, $detve_precio, $detve_tipocambio, $Ventas_vent_ventaid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid, $Calidad_cali_calidadid, $DetalleGarantia_dega_detallegarantiaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAlldetalleventa()
{
$consulta = "SELECT * FROM detalleventa";
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
public static function Updatedetalleventa($detve_cantidad, $detve_precio, $detve_tipocambio, $Ventas_vent_ventaid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid, $Calidad_cali_calidadid, $DetalleGarantia_dega_detallegarantiaid,$detve_detalleventaid)
{
$consulta = "UPDATE detalleventa SET detve_cantidad=?, detve_precio=?, detve_tipocambio=?, Ventas_vent_ventaid=?, Producto_prod_productoid=?, Producto_SubCategoria_subc_subcategoriaid=?, Calidad_cali_calidadid=?, DetalleGarantia_dega_detallegarantiaid=? where detve_detalleventaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detve_cantidad, $detve_precio, $detve_tipocambio, $Ventas_vent_ventaid, $Producto_prod_productoid, $Producto_SubCategoria_subc_subcategoriaid, $Calidad_cali_calidadid, $DetalleGarantia_dega_detallegarantiaid,$detve_detalleventaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletedetalleventa($detve_detalleventaid)
{
$consulta = "DELETE FROM detalleventa where detve_detalleventaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detve_detalleventaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
