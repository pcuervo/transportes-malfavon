<?php 

	$name = $_POST['nombre'];
	$email = $_POST['correo'];
	$vacante = $_POST['vacante'];
	$contact_message = isset( $_POST['mensaje'] ) ? $_POST['mensaje'] : '-';

	// Contacto Transportes Malfavon
	$to = 'recursoshumanos@larealmichoacana.com.mx';
	$subject = 'Contacto página Transportes Malvafon';
	$headers = "From: $name <$email>\r\n";
	$headers .= "Reply-To: recursoshumanos@larealmichoacana.com.mx\r\n";
	$headers .= "Return-Path: recursoshumanos@larealmichoacana.com.mx\r\n";
	$headers .= "CC: aris@pcuervo.com\r\n";
	$headers .= "BCC: aris@pcuervo.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = '<html><body>';
	$message .= '<p>'.$name.' te ha contactado</p>';
	$message .= '<p>Email: '. $email . '</p>';

	if( $vacante != '' ) $message .= '<p>'.$name.' ha solicitado informes de la vacante: ' . $vacante . '</p>';
	
	if( $contact_message != '' ) $message .= '<p>Mensaje: '. $contact_message . '</p>';
	
	$message .= '</body></html>';

	mail($to, $subject, $message, $headers );

	$message = array(
		'error'		=> 0,
		'name'	=> $name,
		);
	echo json_encode($message , JSON_FORCE_OBJECT);

