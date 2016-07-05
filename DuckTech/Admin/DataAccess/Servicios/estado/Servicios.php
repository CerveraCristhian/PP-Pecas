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
public static function Insertestado($esta_nombre, $Paises_pais_paisid)
{
$consulta = "INSERT INTO estado(esta_nombre, Paises_pais_paisid) values (?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($esta_nombre, $Paises_pais_paisid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllestado()
{
$consulta = "SELECT * FROM estado";
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
public static function Updateestado($esta_nombre, $Paises_pais_paisid,$esta_estadoid)
{
$consulta = "UPDATE estado SET esta_nombre=?, Paises_pais_paisid=? where esta_estadoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($esta_nombre, $Paises_pais_paisid,$esta_estadoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleteestado($esta_estadoid)
{
$consulta = "DELETE FROM estado where esta_estadoid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($esta_estadoid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
