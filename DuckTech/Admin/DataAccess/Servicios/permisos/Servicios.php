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
public static function Insertpermisos($perm_nombre)
{
$consulta = "INSERT INTO permisos(perm_nombre) values (?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($perm_nombre));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllpermisos()
{
$consulta = "SELECT * FROM permisos";
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
public static function Updatepermisos($perm_nombre,$perm_permisoid)
{
$consulta = "UPDATE permisos SET perm_nombre=? where perm_permisoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($perm_nombre,$perm_permisoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletepermisos($perm_permisoid)
{
$consulta = "DELETE FROM permisos where perm_permisoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($perm_permisoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
