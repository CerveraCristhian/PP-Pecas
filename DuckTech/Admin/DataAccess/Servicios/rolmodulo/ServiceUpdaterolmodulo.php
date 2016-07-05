<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$Modulos_modu_moduloid = $objDatos->Modulos_modu_moduloid;
$Modulos_TipoModulo_timo_tipomoduloid = $objDatos->Modulos_TipoModulo_timo_tipomoduloid;
$Roles_rol_rolid = $objDatos->Roles_rol_rolid;
$romo_rolmoduloid = $objDatos->romo_rolmoduloid;
$metas = Meta::Updaterolmodulo($Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid, $Roles_rol_rolid, $romo_rolmoduloid);
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
