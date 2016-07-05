<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$cate_categoriaid = $objDatos->cate_categoriaid;
$metas = Meta::SelectCategoriabySubCategoria($cate_categoriaid);
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
