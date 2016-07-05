<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$user_name = $objDatos->user_name;
$user_password = $objDatos->user_password;
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$metas = Meta::Insertusuarios($user_name, $user_password, $Roles_rol_rolid);
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
