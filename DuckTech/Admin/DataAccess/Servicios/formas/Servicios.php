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
public static function Insertformas($form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid)
{
$consulta = "INSERT INTO formas(form_nombre, form_archivo, TipoForma_tifo_tipoformaid, Modulos_modu_moduloid, Modulos_TipoModulo_timo_tipomoduloid) values (?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllformas()
{
$consulta = "SELECT * FROM formas";
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

public static function SelectFormasbyModulo($modu_moduloid)
{
$consulta = "select * from formas where Modulos_modu_moduloid = ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($modu_moduloid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}

public static function Updateformas($form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid,$form_formaid)
{
$consulta = "UPDATE formas SET form_nombre=?, form_archivo=?, TipoForma_tifo_tipoformaid=?, Modulos_modu_moduloid=?, Modulos_TipoModulo_timo_tipomoduloid=? where form_formaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid,$form_formaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteformas($form_formaid)
{
$consulta = "DELETE FROM formas where form_formaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($form_formaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
