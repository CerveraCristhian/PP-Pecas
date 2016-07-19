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
public static function Insertordencompra($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus)
{
$consulta = "INSERT INTO ordencompra(orco_usuariowebid, orco_total, orco_fecha, orco_estatus) values (?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus));
// Capturar primera fila del resultado
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
