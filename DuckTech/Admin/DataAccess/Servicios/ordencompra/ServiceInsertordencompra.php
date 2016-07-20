<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$orco_usuariowebid = $objDatos->orco_usuariowebid;
$orco_total = $objDatos->orco_total;
$orco_fecha = $objDatos->orco_fecha;
$orco_estatus = $objDatos->orco_estatus;
$metas = Meta::Insertordencompra($orco_usuariowebid, $orco_total, $orco_fecha, $orco_estatus);
if ($metas) {

$datos["estado"] = 1;
$datos["ordencompra"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
