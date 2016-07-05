<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$form_formaid = $objDatos->form_formaid;
$metas = Meta::Deleteformas($form_formaid);
if ($metas) {

$datos["estado"] = 1;
$datos["formas"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
