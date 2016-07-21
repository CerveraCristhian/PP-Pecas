<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
define('DS',DIRECTORY_SEPARATOR);
require_once $_SERVER["DOCUMENT_ROOT"].'/'.'PP-Pecas/DuckTech/Admin/DataAccess/Database.php';


class Meta
{

function __construct()
{
}
public static function Insertcategoria($cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion)
{
$consulta = "INSERT INTO categoria(cate_nombre, cate_Activo, cate_fechacreacion, cate_fechamodificacion, cate_usuariocreacion, cate_usuariomodificacion) values (?, ?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function SelectAllcategoria()
{
$consulta = "SELECT * FROM categoria";
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

public static function SelectCategoriaConsubCategoria()
{
$consulta = "select * from categoria as a join subcategoria as b on a.cate_categoriaid = b.Categoria_cate_categoriaid";
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

public static function Updatecategoria($cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion,$cate_categoriaid)
{
$consulta = "UPDATE categoria SET cate_nombre=?, cate_Activo=?, cate_fechacreacion=?, cate_fechamodificacion=?, cate_usuariocreacion=?, cate_usuariomodificacion=? where cate_categoriaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion,$cate_categoriaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletecategoria($cate_categoriaid)
{
$consulta = "DELETE FROM categoria where cate_categoriaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($cate_categoriaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return $e;
}
}
}
