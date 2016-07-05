<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$SubCategoria_subc_subcategoriaid = $objDatos->SubCategoria_subc_subcategoriaid;
$metas = Meta::Deleteproducto($SubCategoria_subc_subcategoriaid);
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
