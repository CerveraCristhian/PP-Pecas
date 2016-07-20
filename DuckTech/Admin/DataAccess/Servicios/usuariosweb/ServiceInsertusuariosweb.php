<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$usrw_nombre = $objDatos->usrw_nombre;
$usrw_password = $objDatos->usrw_password;
$usrw_rolid = $objDatos->usrw_rolid;
$metas = Meta::Insertusuariosweb($usrw_nombre, $usrw_password, $usrw_rolid);
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
