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
public static function Insertrolmodulo($Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid, $Roles_rol_rolid)
{
$consulta = "INSERT INTO rolmodulo(Modulos_modu_moduloid, Modulos_TipoModulo_timo_tipomoduloid, Roles_rol_rolid) values (?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid, $Roles_rol_rolid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return $e;
}
}
public static function SelectAllrolmodulo()
{
$consulta = "select a.romo_rolmoduloid, b.rol_nombre, c.modu_nombre from rolmodulo as a join roles as b on (a.Roles_rol_rolid=b.rol_rolid) join modulos as c on (a.Modulos_modu_moduloid= c.modu_moduloid)";
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
public static function Updaterolmodulo($Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid, $Roles_rol_rolid,$romo_rolmoduloid)
{
$consulta = "UPDATE rolmodulo SET Modulos_modu_moduloid=?, Modulos_TipoModulo_timo_tipomoduloid=?, Roles_rol_rolid=? where romo_rolmoduloid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid, $Roles_rol_rolid,$romo_rolmoduloid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deleterolmodulo($romo_rolmoduloid)
{
$consulta = "DELETE FROM rolmodulo where romo_rolmoduloid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($romo_rolmoduloid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
