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
public static function Insertcompras($comp_fecha, $comp_subtotal, $comp_iva, $comp_total)
{
$consulta = "INSERT INTO compras(comp_fecha, comp_subtotal, comp_iva, comp_total) values (?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($comp_fecha, $comp_subtotal, $comp_iva, $comp_total));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllcompras()
{
$consulta = "SELECT * FROM compras";
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
public static function Updatecompras($comp_fecha, $comp_subtotal, $comp_iva, $comp_total,$comp_compraid)
{
$consulta = "UPDATE compras SET comp_fecha=?, comp_subtotal=?, comp_iva=?, comp_total=? where comp_compraid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($comp_fecha, $comp_subtotal, $comp_iva, $comp_total,$comp_compraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletecompras($comp_compraid)
{
$consulta = "DELETE FROM compras where comp_compraid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($comp_compraid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
