<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$prov_proveedorid = $objDatos->prov_proveedorid;
$metas = Meta::Deleteproveedor($prov_proveedorid);
if ($metas) {

$datos["estado"] = 1;
$datos["proveedor"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
