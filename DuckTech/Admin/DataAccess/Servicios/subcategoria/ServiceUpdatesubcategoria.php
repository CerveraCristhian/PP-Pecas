<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$subc_nombre = $objDatos->subc_nombre;
$subc_activo = $objDatos->subc_activo;
$subc_fechacreacion = $objDatos->subc_fechacreacion;
$subc_fechamodificacion = $objDatos->subc_fechamodificacion;
$subc_usuariocreacion = $objDatos->subc_usuariocreacion;
$subc_usuariomodificacion = $objDatos->subc_usuariomodificacion;
$Categoria_cate_categoriaid = $objDatos->Categoria_cate_categoriaid;
$subc_subcategoriaid = $objDatos->subc_subcategoriaid;
$metas = Meta::Updatesubcategoria($subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid, $subc_subcategoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["subcategoria"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
