<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$esta_nombre = $objDatos->esta_nombre;
$Paises_pais_paisid = $objDatos->Paises_pais_paisid;
$esta_estadoid = $objDatos->esta_estadoid;
$metas = Meta::Updateestado($esta_nombre, $Paises_pais_paisid, $esta_estadoid);
if ($metas) {

$datos["estado"] = 1;
$datos["estado"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
