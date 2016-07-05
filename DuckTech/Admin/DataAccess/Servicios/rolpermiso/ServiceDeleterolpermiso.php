<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$Permisos_perm_permisoid = $objDatos->Permisos_perm_permisoid;
$metas = Meta::Deleterolpermiso($Permisos_perm_permisoid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolpermiso"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
