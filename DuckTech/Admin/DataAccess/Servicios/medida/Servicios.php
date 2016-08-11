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
public static function Insertmedida($medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion)
{
$consulta = "INSERT INTO medida(medi_nombre, medi_activo, medi_fechacreacion, medi_fechamodificacion, medi_usuariocreacion, medi_usuariomodificacion) values (?, ?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllmedida()
{
$consulta = "SELECT * FROM medida";
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
public static function Updatemedida($medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion,$medi_medidaid)
{
$consulta = "UPDATE medida SET medi_nombre=?, medi_activo=?, medi_fechacreacion=?, medi_fechamodificacion=?, medi_usuariocreacion=?, medi_usuariomodificacion=? where medi_medidaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion,$medi_medidaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletemedida($medi_medidaid)
{
$consulta = "DELETE FROM medida where medi_medidaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($medi_medidaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
