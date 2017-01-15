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
public static function Insertdireccionproveedor($direprove_calle, $direprove_numero, $direprove_colonia, $direprove_numeroexterior, $Proveedor_prov_proveedorid)
{
$consulta = "INSERT INTO direccionproveedor(direprove_calle, direprove_numero, direprove_colonia, direprove_numeroexterior, Proveedor_prov_proveedorid) values (?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($direprove_calle, $direprove_numero, $direprove_colonia, $direprove_numeroexterior, $Proveedor_prov_proveedorid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAlldireccionproveedor()
{
$consulta = "SELECT * FROM direccionproveedor";
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
public static function Updatedireccionproveedor($direprove_calle, $direprove_numero, $direprove_colonia, $direprove_numeroexterior, $Proveedor_prov_proveedorid,$direprove_direccionproveedorid)
{
$consulta = "UPDATE direccionproveedor SET direprove_calle=?, direprove_numero=?, direprove_colonia=?, direprove_numeroexterior=?, Proveedor_prov_proveedorid=? where direprove_direccionproveedorid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($direprove_calle, $direprove_numero, $direprove_colonia, $direprove_numeroexterior, $Proveedor_prov_proveedorid,$direprove_direccionproveedorid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletedireccionproveedor($direprove_direccionproveedorid)
{
$consulta = "DELETE FROM direccionproveedor where direprove_direccionproveedorid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($direprove_direccionproveedorid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
