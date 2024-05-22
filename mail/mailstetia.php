
<?php
	$cuerpo = "Prueba de envio de correo electronico\n <br>";
	
	
	$cabeceras = "MIME-Version: 1.0\r\n"; 
	$cabeceras .= "Content-type: text/html; charset=utf-8\r\n"; 
	$cabeceras .= "From: daniel.jorca@gmail.com"; 

	$to = 'daniel.jorca@gmail.com';

	
	$mail_enviado = mail($to, 'STETIA: Formulario de cita online.', $cuerpo, $cabeceras); 

	//$mail_enviado = mail('info@stetia.com; alfonsogarciadiazone@gmail.com', 'STETIA: Formulario de cita online.', $cuerpo, $cabeceras); 

	if ($mail_enviado) { 
		echo "Tus datos han sido enviados!";
		exit(); 
	} 
	else { 
	echo "Error al enviar formulario.";
	}
	
?>
