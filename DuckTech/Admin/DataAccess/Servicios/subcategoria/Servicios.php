<?php

/**
* Representa el la estructura de las metas
* almacenadas en la base de datos
*/
require_once $databaseDirectory;
class Meta
{

function __construct()
{
}
public static function Insertsubcategoria($subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid)
{
$consulta = "INSERT INTO subcategoria(subc_nombre, subc_activo, subc_fechacreacion, subc_fechamodificacion, subc_usuariocreacion, subc_usuariomodificacion, Categoria_cate_categoriaid) values (?, ?, ?, ?, ?, ?, ?)";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}



public static function SelectCategoriabySubCategoria($cate_categoriaid)
{
$consulta = "SELECT * FROM subcategoria where Categoria_cate_categoriaid=?";
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
return -1;
}
}


public static function SelectAllsubcategoria()
{
$consulta = "SELECT * FROM subcategoria as a join categoria as b on (a.Categoria_cate_categoriaid=b.cate_categoriaid)";
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
public static function Updatesubcategoria($subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid,$subc_subcategoriaid)
{
$consulta = "UPDATE subcategoria SET subc_nombre=?, subc_activo=?, subc_fechacreacion=?, subc_fechamodificacion=?, subc_usuariocreacion=?, subc_usuariomodificacion=?, Categoria_cate_categoriaid=? where subc_subcategoriaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid,$subc_subcategoriaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
public static function Deletesubcategoria($subc_subcategoriaid)
{
$consulta = "DELETE FROM subcategoria where subc_subcategoriaid= ?";
try {
// Preparar sentencia
$comando = Database::getInstance()->getDb()->prepare($consulta);
// Ejecutar sentencia preparada
$comando->execute(array($subc_subcategoriaid));
// Capturar primera fila del resultado
return $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// Aquí puedes clasificar el error dependiendo de la excepción
// para presentarlo en la respuesta Json
return -1;
}
}
}
