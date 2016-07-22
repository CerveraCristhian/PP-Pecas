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
public static function Insertcontenidoweb($contw_descripcion, $contw_descripcioningles, $contw_clave)
{
$consulta = "INSERT INTO contenidoweb(contw_descripcion, contw_descripcioningles, contw_clave) values (?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($contw_descripcion, $contw_descripcioningles, $contw_clave));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllcontenidoweb()
{
$consulta = "SELECT * FROM contenidoweb";
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
return $e;
}
}
public static function Updatecontenidoweb($contw_descripcion, $contw_descripcioningles, $contw_clave,$contw_contenidowebid)
{
$consulta = "UPDATE contenidoweb SET contw_descripcion=?, contw_descripcioningles=?, contw_clave=? where contw_contenidowebid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($contw_descripcion, $contw_descripcioningles, $contw_clave,$contw_contenidowebid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletecontenidoweb($contw_contenidowebid)
{
$consulta = "DELETE FROM contenidoweb where contw_contenidowebid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($contw_contenidowebid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
