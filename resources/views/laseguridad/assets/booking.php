<?php

require "PHPMailer/PHPMailerAutoload.php";
//require('PHPMailer/class.phpmailer.php');

if(!$_POST) exit;

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$check_in     = $_POST['check_in'];
$room_type     = $_POST['room_type'];
$email    = $_POST['email'];
$quantity = $_POST['quantity'];

if(trim($check_in) == '') {
	echo '<div class="error_message">Por favor, seleccione una fecha</div>';
	exit();
} else if(trim($room_type ) == '') {
	echo '<div class="error_message">Por favor, seleccione un tipo de habitación.</div>';
	exit();
} else if(trim($email) == '') {
	echo '<div class="error_message">Por favor, digite un telefono.</div>';
	exit();
} else if(trim($email == '')) {
	echo '<div class="error_message">Invalid e-mail address, try again.</div>';
	exit();
} else if(trim($quantity ) == '') {
	echo '<div class="error_message">Por favor, digite un nombre.</div>';
	exit();
} 

/*
//$address = "HERE your email address";
$address = "fabian0320@gmail.com";


// Below the subject of the email
$e_subject = 'You\'ve been contacted by ' . $email . '.';

// You can change this if you feel that you need to.
$e_body = "You have been contacted by \nEmail: $email" . PHP_EOL . PHP_EOL;
$e_content = "Check in and check out date: $check_in\nRoom Type: $room_type\nNumber of guests: $quantity" . PHP_EOL . PHP_EOL;

$msg = wordwrap( $e_body . $e_content , 70 );

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email";
$usersubject = "Magnolia Availability request";
$userheaders = "From: info@magnolia.com\n";
$usermessage = "Thank you for contact MAGNOLIA. We will reply shortly with more details. Here a summary of your request: \n $e_content.  \n\n Call 0034 434324  for further information.";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='color:#fff; padding:10px'>";
	echo "<strong >Email Sent.</strong>Thank you <strong></strong>, your request has been submitted. We will contact you shortly.";
	echo "</div>";

} else {

	echo 'ERROR!';

}*/

$mail = new PHPMailer();
$body = "<html>Hola!, Necesito una reserva:<br><br>
		De una Habitación: {$room_type}<br>
		Para la Fecha: {$check_in}<br>
		Nombre de contacto: {$quantity}<br>
		Mi teléfono es: {$email}<br><br> Gracias..</html>";
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username   = "qatarmotelcucuta@gmail.com";
$mail->Password   = "qatarmotel123";
$mail->SMTPSecure = 'tls';
$mail->SetFrom('qatarmotelcucuta@gmail.com', 'Qatar Motel');
//$mail->AddReplyTo("youraccount@gmail.com","Your name");
$mail->Subject    = "Necestio una Reserva";
$mail->AltBody    = "Any message.";
$mail->MsgHTML($body);
$address = "qatarmotelcucuta@gmail.com";
$mail->AddAddress($address, "fabian0320");
if(!$mail->Send()) {
	echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
} else {
	echo "Mensaje enviado!!";
}