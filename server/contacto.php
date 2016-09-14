<?php 	

	require 'Conexion.php';
	require 'phpmailer/PHPMailerAutoload.php';
	require 'phpmailer/class.pop3.php';

	function enviaMail($nombre,$email,$mensaje,$telefono){
		//Envia Mail Admin
		$mail = new PHPMailer;
		// $mail->SMTPDebug = 3;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$mail->Username = 'erik.genaro@gmail.com';
		$mail->Password = 'V360w800@';
		$mail->Port = 587;
		$mail->setFrom('erik.genaro@gmail.com','Contacto ERIK');  
		$mail->addAddress('erik.genaro@gmail.com');

		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Nuevo contacto a tu curriculum'; //Gracias por tu interés 
		$mail->Body = "Alguien se ha registrado en el landing de tu Curriculum con los siguientes datos<br>
                          Nombre: ".$nombre."<br>"
                          ."Telefono: ".$telefono."<br>"
                          ."Correo: ".$email."<br>"
                          ."Mensaje: ".$mensaje;
        $mail->Body = str_replace('\r\n','<br>', $mail->Body ); //reemplaza los espacios predeterminados en el body por un salto real de linea con br, y el tercer parametro indica donde se hara ese reemplazo es decir en el body--                  


		
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;

		} else{
			echo 'Correo enviado';
		}

	    

	    //Envia Mail User
		$mail = new PHPMailer;
		// $mail->SMTPDebug = 3;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$mail->Username = 'erik.genaro@gmail.com';
		$mail->Password = 'V360w800@';
		$mail->Port = 587;
		$mail->setFrom('erik.genaro@gmail.com','ERIK DEV');  
		
		$mail->addAddress($email);
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Gracias por ponerte en contacto  '.$nombre; //Gracias por tu interés 
		$mail->Body = "En breve me comunicare contigo";
        $mail->Body = str_replace('\r\n','<br>', $mail->Body ); //reemplaza los espacios predeterminados en el body por un salto real de linea con br, y el tercer parametro indica donde se hara ese reemplazo es decir en el body--                  


		
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;

		} else{
			echo 'Correo enviado';
		}

	    }
	   



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
		enviaMail($nombre,$mail,$mensaje,$tel);
		echo "<div id='AjaxAction'><script>document.getElementById('curriform').reset(); </script> 
							<script>swal({   title: '¡Gracias!',   text: 'Datos guardados con éxito',   type: 'success',   showCancelButton: false,   confirmButtonColor: '#62CB7E',   confirmButtonText: 'O.K',   closeOnConfirm: true }); </script></div>";
	//*enviaMail($nombre,$mail,$mensaje);
    //header('Location: ../thankyou.html');
    }

	else{
	echo "<div id='AjaxAction'>
						<script>swal({   title: 'Error',   text: 'Ocurrio un error en la base de datos',   type: 'error',   showCancelButton: false,   confirmButtonColor: '#EE3B24',   confirmButtonText: 'O.K',   closeOnConfirm: true }); </script></div>"; 
	echo   mysqli_error($db);

		}
	}
     else{

    echo "<div id='AjaxAction'> 
						 	<script>swal({   title: 'Error',   text: 'E-mail inválido',   type: 'error',   showCancelButton: false,   confirmButtonColor: '#EE3B24',   confirmButtonText: 'O.K',   closeOnConfirm: true });</script></div>";
		 }
		}

		else{
			echo "<div id='AjaxAction'> 
						 	<script>swal({   title: 'Ojo',   text: 'Datos incompletos',   type: 'warning',   showCancelButton: false,   confirmButtonColor: '#C68A53',   confirmButtonText: 'O.K',   closeOnConfirm: true }); </script></div>";
		}
 ?>
 
