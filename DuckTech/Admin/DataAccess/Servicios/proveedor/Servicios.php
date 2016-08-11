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
public static function Insertproveedor($prov_nombre, $prov_amaterno, $prov_apaterno, $prov_email, $prov_emailrazon, $prov_fechaingresosistema, $prov_razonsocial, $prov_observaciones, $prov_rfc, $prov_fax)
{
$consulta = "INSERT INTO proveedor(prov_nombre, prov_amaterno, prov_apaterno, prov_email, prov_emailrazon, prov_fechaingresosistema, prov_razonsocial, prov_observaciones, prov_rfc, prov_fax) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($prov_nombre, $prov_amaterno, $prov_apaterno, $prov_email, $prov_emailrazon, $prov_fechaingresosistema, $prov_razonsocial, $prov_observaciones, $prov_rfc, $prov_fax));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllproveedor()
{
$consulta = "SELECT * FROM proveedor";
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
public static function Updateproveedor($prov_nombre, $prov_amaterno, $prov_apaterno, $prov_email, $prov_emailrazon, $prov_fechaingresosistema, $prov_razonsocial, $prov_observaciones, $prov_rfc, $prov_fax,$prov_proveedorid)
{
$consulta = "UPDATE proveedor SET prov_nombre=?, prov_amaterno=?, prov_apaterno=?, prov_email=?, prov_emailrazon=?, prov_fechaingresosistema=?, prov_razonsocial=?, prov_observaciones=?, prov_rfc=?, prov_fax=? where prov_proveedorid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($prov_nombre, $prov_amaterno, $prov_apaterno, $prov_email, $prov_emailrazon, $prov_fechaingresosistema, $prov_razonsocial, $prov_observaciones, $prov_rfc, $prov_fax,$prov_proveedorid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteproveedor($prov_proveedorid)
{
$consulta = "DELETE FROM proveedor where prov_proveedorid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($prov_proveedorid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
