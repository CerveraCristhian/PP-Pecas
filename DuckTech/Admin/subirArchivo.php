<?php
require_once $databaseDirectory;
/*foreach($_POST['form'] as $key => $value) {
    $_POST['form'][$key] = utf8_decode($value);
}
*/
$clie_nombre=$_POST['form']['nombres'];
$clie_amaterno=$_POST['form']['amaterno'];
$clie_apaterno=$_POST['form']['apaterno'];
$clie_email=$_POST['form']['email'];
$clie_emailrazon=$_POST['form']['emailrs'];
$clie_fechaingresosistema=date("Y-m-d H:i:s");
$clie_razonsocial=$_POST['form']['razonsocial'];
$clie_observaciones='---';
$clie_rfc=$_POST['form']['rfc'];
$clie_fax=$_POST['form']['fax'];
$customerID = preregistro($clie_nombre, $clie_amaterno, $clie_apaterno, $clie_email, $clie_emailrazon, $clie_fechaingresosistema, $clie_razonsocial, $clie_observaciones, $clie_rfc, $clie_fax);

if (!$customerID) {
	echo "No se pudo realizar el preregistro";
    die("No se pudo realizar el preregistro");
}
$folder = 'Documentos';
$uploaddir = 'Documentos/'.$customerID.'/';
if (!file_exists($folder.'/'.$customerID)) {
            mkdir($folder.'/'.$customerID, 0777, true);
}
foreach ($_POST['images'] as $key => $value) {
    $file = $value['value'];
    $name = $value['name'];

    // obtener la extensión
    $getMime = explode('.', $name);
    $mime = end($getMime);
    $data = explode(',', $file);
    // Codificado
    $encodedData = str_replace(' ','+',$data[1]);
    $decodedData = base64_decode($encodedData);

    //Agregar fecha de subida a archivos sin fecha.
    if (substr_count($name, '-')<2) {
    	$name= substr($name, 0, -4) . "_" . date('Y-m-d') .'.'. $mime;
    	# code...
    }
    if(file_put_contents($uploaddir.$name, $decodedData)) {
    	//echo $name.":Subida exitosa";
    }
    else {
    	// Show an error message should something go wrong.
    	//echo "Error";
    }
}
$directorio = 'Documentos/'.$customerID;
$ficheros =array_values( array_diff (scandir($directorio), array('..', '.','.DS_Store')));
/*SEND MAIL*/
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "correo@gmail.com";
$mail->Password = "Password";
$mail->setFrom('dc4ath@gmail.com', 'First1 Last1');
$mail->addReplyTo('dc4ath@gmail.com', 'First2 Last2');
$mail->addAddress('dc4ath@gmail.com', 'John Doe');
$mail->Subject = 'Solicitud de registro DRUCKTECH';
if (!empty($ficheros)) {
    foreach ($ficheros as $fichero) {
            $mail->AddEmbeddedImage($uploaddir.$fichero, $fichero);
    }
}


$mail->Body = "Se ha registrado un cliente con la siguiente información:<br />
<br />Nombres: ".$clie_nombre."
<br />Apellido Materno:".$clie_amaterno."
<br />Apellido Paterno: ".$clie_apatern."
<br />Correo electrónico: ".$clie_email."
<br />Correó electrónico de Razón Social: ".$clie_emailrazon."
<br />Fecha de registro: ".$clie_fechaingresosistema."
<br />".$clie_razonsocial."
<br />RFC: ".$clie_rfc."
<br />FAX: ".$clie_fax;
$mail->IsHTML(true);
//$mail->AltBody = 'This is a plain-text message body';
if (!$mail->send()) {
	file_put_contents("mailErrInfo", json_encode($mail->ErrorInfo));
} else {
    file_put_contents("mailErrInfo", "Sent succesfullt");
}




?>
