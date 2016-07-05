<?php
session_start();
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));

$prod_productoid= $_SESSION['ProductoID'];
$metas = Meta::SelectProductoByID($prod_productoid);
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
