<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
require_once $databaseDirectory;sesionvalida();;

class Meta
{

function __construct()
{
}
public static function Insertinsumos($insu_nombre, $insu_descripcion)
{
$consulta = "INSERT INTO insumos(insu_nombre, insu_descripcion) values (?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($insu_nombre, $insu_descripcion));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllinsumos()
{
$consulta = "SELECT * FROM insumos";
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
public static function Updateinsumos($insu_nombre, $insu_descripcion,$insu_insumosid)
{
$consulta = "UPDATE insumos SET insu_nombre=?, insu_descripcion=? where insu_insumosid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($insu_nombre, $insu_descripcion,$insu_insumosid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteinsumos($insu_insumosid)
{
$consulta = "DELETE FROM insumos where insu_insumosid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($insu_insumosid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
