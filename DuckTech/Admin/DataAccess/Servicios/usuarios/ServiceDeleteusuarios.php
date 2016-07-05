<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$user_usuarioid = $objDatos->user_usuarioid;
$metas = Meta::Deleteusuarios($user_usuarioid);
if ($metas) {

$datos["estado"] = 1;
$datos["usuarios"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
