<?php
header('Content-type: application/json');
require 'Servicios.php';
$objDatos = json_decode(file_get_contents("php://input"));
$form_nombre = $objDatos->form_nombre;
$form_archivo = $objDatos->form_archivo;
$TipoForma_tifo_tipoformaid = $objDatos->TipoForma_tifo_tipoformaid;
$Modulos_modu_moduloid = $objDatos->Modulos_modu_moduloid;
$Modulos_TipoModulo_timo_tipomoduloid = $objDatos->Modulos_TipoModulo_timo_tipomoduloid;
$form_formaid = $objDatos->form_formaid;
$metas = Meta::Updateformas($form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid, $form_formaid);
if ($metas) {

$datos["estado"] = 1;
$datos["formas"] = $metas;

print json_encode($datos);
} else {
print json_encode(array(
"estado" => 2,
"mensaje" => "Ha ocurrido un error"
));
}


?>
