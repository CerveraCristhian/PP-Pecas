<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$Categoria_cate_categoriaid = $objDatos->Categoria_cate_categoriaid;
$metas = Meta::SelectAllproductobyCategoria($Categoria_cate_categoriaid);
if ($metas) {

$datos["estado"] = 1;
$datos["producto"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>