<?php 	

	require 'Conexion.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.pop3.php';
/*
	function enviaMail($mail,$nombre,$mensaje){
		//Envia Mail
		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;

		$mail->isSMTP();
		$mail->Host = 'Gmail';
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
				   isset($_POST['tel']) && !empty($_POST['tel']) AND
				   isset($_POST['mail']) && !empty($_POST['mail']) AND
				   isset($_POST['mensaje']) && !empty($_POST['mensaje']))

				{
					
					$mail = mysqli_real_escape_string($db,$_POST['mail']);
					$nombre = mysqli_real_escape_string($db,$_POST['nombre']);
				    $tel = mysqli_real_escape_string($db,$_POST['tel']);
					$mensaje = mysqli_real_escape_string($db,$_POST['mensaje']);



					if(checkMail($mail)){
	$sql="INSERT INTO contactoscurri (`id`, `nombre`,`tel`,`email`, `mensaje`) VALUES
	('','$nombre','$tel','$mail','$mensaje')";
    $saveDB = mysqli_query($db, $sql);
	if($saveDB){
		echo "<div id='AjaxAction'><script>document.getElementById('curriform').reset(); </script> 
							<script>sweetAlert('¡Gracias!','Datos guardados', 'success'); </script></div>";



	//*enviaMail($nombre,$mail,$mensaje);
    //header('Location: ../thankyou.html');
    }

	else{
	echo "<div id='AjaxAction'>
						<script>sweetAlert('Error','Ocurrio un error en la base de datos','error'); </script></div>"; 
	echo   mysqli_error($db);

		}
	}
     else{

    echo "<div id='AjaxAction'> 
						 	<script>sweetAlert('Error','Error mail invalido','error'); </script></div>";
		 }
		}

		else{
			echo "<div id='AjaxAction'> 
						 	<script>sweetAlert('Error','Datos incompletos','error'); </script></div>";
		}
 ?>
 
