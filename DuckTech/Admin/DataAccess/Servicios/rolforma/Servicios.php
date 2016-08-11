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
public static function Insertrolforma($Formas_form_formaid, $Roles_rol_rolid)
{
$consulta = "INSERT INTO rolforma(Formas_form_formaid, Roles_rol_rolid) values (?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($Formas_form_formaid, $Roles_rol_rolid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllrolforma()
{
$consulta = "select c.rol_nombre, d.modu_nombre, b.form_nombre, a.rofo_rolformaid from rolforma as a join formas as b on (a.Formas_form_formaid = b.form_formaid) join roles as c on (a.Roles_rol_rolid=c.rol_rolid) join Modulos as d on (b.Modulos_modu_moduloid = d.modu_moduloid)";
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
public static function Updaterolforma($Formas_form_formaid, $Roles_rol_rolid,$rofo_rolformaid)
{
$consulta = "UPDATE rolforma SET Formas_form_formaid=?, Roles_rol_rolid=? where rofo_rolformaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($Formas_form_formaid, $Roles_rol_rolid,$rofo_rolformaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleterolforma($rofo_rolformaid)
{
$consulta = "DELETE FROM rolforma where rofo_rolformaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($rofo_rolformaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
