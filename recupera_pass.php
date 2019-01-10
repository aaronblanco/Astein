<?php
	require 'connection.php';
	require 'log_funcion.php';
	include 'user_feedback.php';

	header('Content-type: text/plain; charset=utf-8');

	if(!empty($_POST))
	{
	     	$email = strip_tags($_POST['email']);
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$query_admin = $connection->prepare("SELECT * from administrator where email=? ");
					$query_admin->bind_param("s", $email);
					$query_admin->execute();
					$result_admin = $query_admin->get_result();
						if ($result_admin or (mysqli_num_rows($result_admin) == 1)){
							$pass = $row['password']
							$password = base64_decode($pass);
							echo $password;
							$para      = $email;
							$titulo    = 'Your password';
							$mensaje   = "Hello admin, your password is $password";
							$cabeceras = 'From: administracion@astein.net' . "\r\n" .
									'Reply-To: ' .$email . "\r\n" .
									'X-Mailer: PHP/' . phpversion();

							mail($para, $titulo, $mensaje, $cabeceras);

							write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
					                                 "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
					                                 ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
					                                 $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
					                                 $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
					                                 $_SERVER['REQUEST_URI']. "\nSe ha mandado la contraseña a la dirección de correo electrónico $mail","INFO");

							$_SESSION["message-success"] = "Se ha mandado la contraseña a la dirección de correo electrónico $email";
							header("Location: recupera.php");

						} else {
							 $_SESSION["message-warning"] = "La direccion de correo electronico no existe";
							 header("Location: recupera.php");
				}

			} else {

						 $_SESSION["message-warning"] = "Correo no valido.";
						 header("Location: recupera.php");
					 }
}
?>
