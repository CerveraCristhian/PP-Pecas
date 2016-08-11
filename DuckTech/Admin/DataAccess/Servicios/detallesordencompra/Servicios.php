<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
define('DS',DIRECTORY_SEPARATOR);
require_once $_SERVER["DOCUMENT_ROOT"].DS.'PP-Pecas/DuckTech/Admin/DataAccess/Database.php';
class Meta
{

function __construct()
{
}
public static function Insertdetallesordencompra($detoc_ordencompraid, $detoc_productoid, $detoc_preciounitario, $detoc_cantidad, $detoc_total)
{
$consulta = "INSERT INTO detallesordencompra(detoc_ordencompraid, detoc_productoid, detoc_preciounitario, detoc_cantidad, detoc_total) values (?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detoc_ordencompraid, $detoc_productoid, $detoc_preciounitario, $detoc_cantidad, $detoc_total));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}





public static function SelectDetallesOrdenCompraByOrdenCompraID($detoc_ordencompraid)
{
$consulta = "select b.detoc_detalleordencompraid as ID, c.prod_nombre as Nombre, b.detoc_cantidad as PZAS, b.detoc_preciounitario as PrecioUnitario, b.detoc_total as Total from ordencompra as a join detallesordencompra as b on (a.orco_ordencompraid = b.detoc_ordencompraid)  join producto as c on (b.detoc_productoid = c.prod_productoid) where a.orco_ordencompraid = ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detoc_ordencompraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return $e;
}
}


public static function SelectAlldetallesordencompra()
{
$consulta = "SELECT * FROM detallesordencompra";
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
public static function Updatedetallesordencompra($detoc_ordencompraid, $detoc_productoid, $detoc_preciounitario, $detoc_cantidad, $detoc_total,$detoc_detalleordencompraid)
{
$consulta = "UPDATE detallesordencompra SET detoc_ordencompraid=?, detoc_productoid=?, detoc_preciounitario=?, detoc_cantidad=?, detoc_total=? where detoc_detalleordencompraid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detoc_ordencompraid, $detoc_productoid, $detoc_preciounitario, $detoc_cantidad, $detoc_total,$detoc_detalleordencompraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletedetallesordencompra($detoc_detalleordencompraid)
{
$consulta = "DELETE FROM detallesordencompra where detoc_detalleordencompraid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($detoc_detalleordencompraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
