<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$usrw_usuarioid = $objDatos->usrw_usuarioid;
$metas = Meta::Deleteusuariosweb($usrw_usuarioid);
if ($metas) {

$datos["estado"] = 1;
$datos["usuariosweb"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
