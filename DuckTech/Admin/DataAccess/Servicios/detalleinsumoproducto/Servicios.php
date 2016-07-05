<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
require_once '../../Database.php';

class Meta
{

function __construct()
{
}
public static function Insertdetalleinsumoproducto($DetalleVenta_detve_detalleventaid, $Insumos_insu_insumosid)
{
$consulta = "INSERT INTO detalleinsumoproducto(DetalleVenta_detve_detalleventaid, Insumos_insu_insumosid) values (?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($DetalleVenta_detve_detalleventaid, $Insumos_insu_insumosid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAlldetalleinsumoproducto()
{
$consulta = "SELECT * FROM detalleinsumoproducto";
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
public static function Updatedetalleinsumoproducto($DetalleVenta_detve_detalleventaid, $Insumos_insu_insumosid,$dein_detalleinsumoproductoid)
{
$consulta = "UPDATE detalleinsumoproducto SET DetalleVenta_detve_detalleventaid=?, Insumos_insu_insumosid=? where dein_detalleinsumoproductoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($DetalleVenta_detve_detalleventaid, $Insumos_insu_insumosid,$dein_detalleinsumoproductoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletedetalleinsumoproducto($dein_detalleinsumoproductoid)
{
$consulta = "DELETE FROM detalleinsumoproducto where dein_detalleinsumoproductoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($dein_detalleinsumoproductoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
