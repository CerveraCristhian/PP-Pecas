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
public static function Insertrolpermiso($Roles_rol_rolid,$Permisos_perm_permisoid)
{
$consulta = "INSERT INTO rolpermiso(Roles_rol_rolid,Permisos_perm_permisoid) values (?,?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($Roles_rol_rolid,$Permisos_perm_permisoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllrolpermiso()
{
$consulta = "select * from rolpermiso as a join  roles as b on (a.Roles_rol_rolid=b.rol_rolid) join permisos as c on (a.Permisos_perm_permisoid=c.perm_permisoid)";
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
public static function Updaterolpermiso($Roles_rol_rolid,$Permisos_perm_permisoid)
{
$consulta = "UPDATE rolpermiso SET Roles_rol_rolid=? where Permisos_perm_permisoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($Roles_rol_rolid,$Permisos_perm_permisoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleterolpermiso($Permisos_perm_permisoid)
{
$consulta = "DELETE FROM rolpermiso where Permisos_perm_permisoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($Permisos_perm_permisoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
