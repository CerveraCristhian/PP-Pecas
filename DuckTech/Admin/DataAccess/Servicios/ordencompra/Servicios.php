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

public static function Insertordencompra($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus)
{
$consulta = "INSERT INTO ordencompra(orco_usuariowebid, orco_total, orco_fecha, orco_estatus) values (?, ?, ?, ?)";
$consulta2 = 'Select @@identity as idlast';

try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus));
// Capturar primera fila del resultado
$comando = Database::getInstance()->getDb()->prepare($consulta2);
$comando -> execute();
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return $e;
}
}
public static function SelectAllordencompra()
{
$consulta = "SELECT * FROM ordencompra";
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


public static function SelectOrdenCompraDesktop()
{
$consulta = "select a.orco_ordencompraid as ID, a.orco_fecha as Fecha,  b.usrw_nombre as Usuario, a.orco_total as Total, a.orco_estatus as Estatus from ordencompra as a join usuariosweb  as b on a.orco_usuariowebid = b.usrw_usuarioid";
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


public static function Updateordencompra($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus,$orco_ordencompraid)
{
$consulta = "UPDATE ordencompra SET orco_usuariowebid=?, orco_total=?, orco_fecha=?, orco_estatus=? where orco_ordencompraid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus,$orco_ordencompraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteordencompra($orco_ordencompraid)
{
$consulta = "DELETE FROM ordencompra where orco_ordencompraid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($orco_ordencompraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
