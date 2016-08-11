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
public static function Insertventas($vent_fecha, $vent_subtotal, $vent_iva, $vent_total)
{
$consulta = "INSERT INTO ventas(vent_fecha, vent_subtotal, vent_iva, vent_total) values (?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($vent_fecha, $vent_subtotal, $vent_iva, $vent_total));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllventas()
{
$consulta = "SELECT * FROM ventas";
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
public static function Updateventas($vent_fecha, $vent_subtotal, $vent_iva, $vent_total,$vent_ventaid)
{
$consulta = "UPDATE ventas SET vent_fecha=?, vent_subtotal=?, vent_iva=?, vent_total=? where vent_ventaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($vent_fecha, $vent_subtotal, $vent_iva, $vent_total,$vent_ventaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteventas($vent_ventaid)
{
$consulta = "DELETE FROM ventas where vent_ventaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($vent_ventaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
