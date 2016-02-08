<?php 	

	require 'Conexion.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.pop3.php';

	/*function enviaMail($mail,$nombre,$mensaje){
		//Envia Mail
		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;

		$mail->isSMTP();
		$mail->Host = '';
		$mail->SMTPAuth = true;
		$mail->Username = 'marketing@quality.com.mx';
		$mail->Password = 'Accion559';
		$mail->Port = 587;
		$mail->setFrom('marketing@quality.com.mx','Contacto Quality');  
		$mail->addAddress($mail,$nombre,$mensaje);
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Gracias por tu interés'; 
		$mail->Body = "Alguien se ha registrado en el landing de Autoefectivo con los siguientes datos
                          Nombre: ".$name."
                          Email: ".$mail."
                          Mensaje: ".$mensaje;

		
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;

		} else{
			echo 'mensaje enviado';
		}

	    }
	    */
	    	//Mail checker
	function checkMail($mail){
if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $mail))
{
return true;
}else{
return false;
}
				
}				 		


				if(isset($_POST['nombre']) && !empty($_POST['nombre']) AND
				   isset($_POST['ape']) && !empty($_POST['ape']) AND
				   isset($_POST['tel']) && !empty($_POST['tel']) AND
				   isset($_POST['mail']) && !empty($_POST['mail']) AND
				   isset($_POST['mensaje']) && !empty($_POST['mensaje']))

				{
					
					$mail = mysqli_real_escape_string($db,$_POST['mail']);
					$nombre = mysqli_real_escape_string($db,$_POST['nombre']);
					$ape = mysqli_real_escape_string($db,$_POST['ape']);
					$tel = mysqli_real_escape_string($db,$_POST['tel']);
					$mensaje = mysqli_real_escape_string($db,$_POST['mensaje']);



					if  (checkMail($mail)){
	$sql="INSERT INTO contactoscurri (`id`, `nombre`, `ape`, `tel`,`email`, `mensaje`) VALUES
	('','$nombre','$ape','$tel','$mail','$mensaje')";
    $saveDB = mysqli_query($db, $sql);
	if($saveDB){
		echo "Datos guardados";


	//*enviaMail($nombre,$mail,$mensaje);
    //header('Location: ../thankyou.html');
    }

	else{
	echo "Error no se guardo en base de datos. \n \n";
	echo   mysqli_error($db);
		}
	}
     else{

    echo "Introduce un mail valido porfavor";
		 }
		}

		else{
			echo "Debes completar todos los campos";
		}
 ?>
 
