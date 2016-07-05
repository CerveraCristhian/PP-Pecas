<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$Modulos_modu_moduloid = $objDatos->Modulos_modu_moduloid;
$Modulos_TipoModulo_timo_tipomoduloid = $objDatos->Modulos_TipoModulo_timo_tipomoduloid;
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$metas = Meta::Insertrolmodulo($Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid, $Roles_rol_rolid);
if ($metas) {

$datos["estado"] = 1;
$datos["rolmodulo"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
