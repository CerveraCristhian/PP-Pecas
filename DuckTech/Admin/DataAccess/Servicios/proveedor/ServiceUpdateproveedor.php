<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$prov_nombre = $objDatos->prov_nombre;
$prov_amaterno = $objDatos->prov_amaterno;
$prov_apaterno = $objDatos->prov_apaterno;
$prov_email = $objDatos->prov_email;
$prov_emailrazon = $objDatos->prov_emailrazon;
$prov_fechaingresosistema = $objDatos->prov_fechaingresosistema;
$prov_razonsocial = $objDatos->prov_razonsocial;
$prov_observaciones = $objDatos->prov_observaciones;
$prov_rfc = $objDatos->prov_rfc;
$prov_fax = $objDatos->prov_fax;
$prov_proveedorid = $objDatos->prov_proveedorid;
$metas = Meta::Updateproveedor($prov_nombre, $prov_amaterno, $prov_apaterno, $prov_email, $prov_emailrazon, $prov_fechaingresosistema, $prov_razonsocial, $prov_observaciones, $prov_rfc, $prov_fax, $prov_proveedorid);
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
