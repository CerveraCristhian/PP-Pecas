<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
//define('DS',DIRECTORY_SEPARATOR);
//require_once $_SERVER["DOCUMENT_ROOT"].DS.'PP-Pecas/DuckTech/Admin/DataAccess/Database.php';
//require_once '../../../Dataaccess/Database.php';
require_once $databaseDirectory;sesionvalida();;

class Meta
{

function __construct()
{
}
public static function Insertmarca($marc_nombre, $marc_activo)
{
$consulta = "INSERT INTO marca(marc_nombre, marc_activo) values (?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($marc_nombre, $marc_activo));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllmarca()
{
$consulta = "SELECT * FROM marca";
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
public static function Updatemarca($marc_nombre, $marc_activo,$marc_marcaid)
{
$consulta = "UPDATE marca SET marc_nombre=?, marc_activo=? where marc_marcaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($marc_nombre, $marc_activo,$marc_marcaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletemarca($marc_marcaid)
{
$consulta = "DELETE FROM marca where marc_marcaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($marc_marcaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
