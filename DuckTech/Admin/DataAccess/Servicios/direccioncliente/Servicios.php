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
public static function Insertdireccioncliente($direclie_calle, $direclie_numero, $direclie_colonia, $direclie_numeroexterior, $Clientes_clie_clienteid)
{
$consulta = "INSERT INTO direccioncliente(direclie_calle, direclie_numero, direclie_colonia, direclie_numeroexterior, Clientes_clie_clienteid) values (?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($direclie_calle, $direclie_numero, $direclie_colonia, $direclie_numeroexterior, $Clientes_clie_clienteid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAlldireccioncliente()
{
$consulta = "SELECT * FROM direccioncliente";
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
public static function Updatedireccioncliente($direclie_calle, $direclie_numero, $direclie_colonia, $direclie_numeroexterior, $Clientes_clie_clienteid,$direclie_direccionclienteid)
{
$consulta = "UPDATE direccioncliente SET direclie_calle=?, direclie_numero=?, direclie_colonia=?, direclie_numeroexterior=?, Clientes_clie_clienteid=? where direclie_direccionclienteid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($direclie_calle, $direclie_numero, $direclie_colonia, $direclie_numeroexterior, $Clientes_clie_clienteid,$direclie_direccionclienteid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletedireccioncliente($direclie_direccionclienteid)
{
$consulta = "DELETE FROM direccioncliente where direclie_direccionclienteid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($direclie_direccionclienteid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
