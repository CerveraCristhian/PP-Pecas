<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$ciud_nombre = $objDatos->ciud_nombre;
$Estado_esta_estadoid = $objDatos->Estado_esta_estadoid;
$ciud_ciudadid = $objDatos->ciud_ciudadid;
$metas = Meta::Updateciudad($ciud_nombre, $Estado_esta_estadoid, $ciud_ciudadid);
if ($metas) {

$datos["estado"] = 1;
$datos["ciudad"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
