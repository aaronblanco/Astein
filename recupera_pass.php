<?php
	require 'connection.php';
	include 'log_funcion.php';



	if(!empty($_POST))
	{
	     	$email = strip_tags($_POST['email']);
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$query_admin = $connection->prepare("SELECT * from administrator where email=? ");
					$query_admin->bind_param("s", $email);
					$query_admin->execute();
					$result_admin = $query_admin->get_result();
						if ($result_admin and (mysqli_num_rows($result_admin) == 1)){
							$para      = $email;
							$titulo    = 'Recuperar contraseña';
							$mensaje   = 'Hola, tu contraseña es ' .$row['password'];
							$cabeceras = 'From: administracion@astein.net' . "\r\n" .
									'Reply-To: ' .$email . "\r\n" .
									'X-Mailer: PHP/' . phpversion();

							mail($para, $titulo, $mensaje, $cabeceras);
							echo "Se ha enviado un correo a la direccion " .$email;
							}

						else
							 echo  "La direccion de correo electronico no existe";
				}
    	
			       echo  "Correo no valido.";

	}
?>
