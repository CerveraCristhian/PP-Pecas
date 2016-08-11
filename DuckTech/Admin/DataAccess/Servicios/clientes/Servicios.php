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
public static function Insertclientes($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax)
{
$consulta = "INSERT INTO clientes(clie_nombre, clie_amaterno, clie_apaterno, clie_email, clie_emailrazon, clie_fechaingresosistema, clie_razonsocial, clie_observaciones, clie_rfc, clie_fax) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllclientes()
{
$consulta = "SELECT * FROM clientes";
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
public static function Updateclientes($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax,$clie_clienteid)
{
$consulta = "UPDATE clientes SET clie_nombre=?, clie_amaterno=?, clie_apaterno=?, clie_email=?, clie_emailrazon=?, clie_fechaingresosistema=?, clie_razonsocial=?, clie_observaciones=?, clie_rfc=?, clie_fax=? where clie_clienteid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax,$clie_clienteid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteclientes($clie_clienteid)
{
$consulta = "DELETE FROM clientes where clie_clienteid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($clie_clienteid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
