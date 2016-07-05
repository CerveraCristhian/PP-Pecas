<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$clie_nombre = $objDatos->clie_nombre;
$clie_amaterno = $objDatos->clie_amaterno;
$clie_apaterno = $objDatos->clie_apaterno;
$clie_email = $objDatos->clie_email;
$clie_emailrazon = $objDatos->clie_emailrazon;
$clie_fechaingresosistema = $objDatos->clie_fechaingresosistema;
$clie_razonsocial = $objDatos->clie_razonsocial;
$clie_observaciones = $objDatos->clie_observaciones;
$clie_rfc = $objDatos->clie_rfc;
$clie_fax = $objDatos->clie_fax;
$metas = Meta::Insertclientes($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax);
if ($metas) {

$datos["estado"] = 1;
$datos["clientes"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
