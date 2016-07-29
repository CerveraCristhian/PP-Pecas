<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
define('DS',DIRECTORY_SEPARATOR);
require_once $_SERVER["DOCUMENT_ROOT"].'/'.'PP-Pecas/DuckTech/Admin/DataAccess/Database.php';
class Meta
{

function __construct()
{
}
public static function Insertusuariosweb($usrw_nombre, $usrw_password, $usrw_rolid)
{
$consulta = "INSERT INTO usuariosweb(usrw_nombre, usrw_password, usrw_rolid) values (?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($usrw_nombre, $usrw_password, $usrw_rolid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllusuariosweb()
{
$consulta = "SELECT * FROM usuariosweb";
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
public static function Updateusuariosweb($usrw_nombre, $usrw_password, $usrw_rolid,$usrw_usuarioid)
{
$consulta = "UPDATE usuariosweb SET usrw_nombre=?, usrw_password=?, usrw_rolid=? where usrw_usuarioid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($usrw_nombre, $usrw_password, $usrw_rolid,$usrw_usuarioid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteusuariosweb($usrw_usuarioid)
{
$consulta = "DELETE FROM usuariosweb where usrw_usuarioid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($usrw_usuarioid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
