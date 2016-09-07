<?php
include("class.phpmailer.php");
header('Location: ../index.php');
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$asunto=$_POST['asunto'];
$texto=$_POST['mensaje'];
date_default_timezone_set('America/Bogota');
$usuario="fabianbustamante_20@hotmail.com";
$mail             = new PHPMailer();
$body = $texto;
$mail->IsSMTP();
$mail->SMTPDebug = true;
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "noresponderinmobiliaria@gmail.com";  // GMAIL username
$mail->Password   = "123seguridad";            // GMAIL password
$mail->From       = $email;
$mail->FromName   = $nombre."  ".$email;
$mail->Subject    = $asunto;
$mail->Body       = $texto;                      //HTML Body
$mail->AltBody    = $texto;
$mail->WordWrap   = 50; // set word wrap
$mail->Timeout=30;
$mail->MsgHTML($body);
$mail->AddAddress($usuario, " ");
$mail->IsHTML(true); // send as HTML
if(!$mail->Send()) {
	//echo "Error enviando: " . $mail->ErrorInfo;
} else {}
?>
