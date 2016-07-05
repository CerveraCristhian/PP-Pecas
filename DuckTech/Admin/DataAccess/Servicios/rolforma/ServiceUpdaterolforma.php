<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$Formas_form_formaid = $objDatos->Formas_form_formaid;
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$rofo_rolformaid = $objDatos->rofo_rolformaid;
$metas = Meta::Updaterolforma($Formas_form_formaid, $Roles_rol_rolid, $rofo_rolformaid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolforma"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
