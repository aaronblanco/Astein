<?php
	require 'connection.php';
	include 'log_funcion.php';

	session_start();

	if(isset($_SESSION["name"])){
		header("Location: admin_inicio.php");
	}

	$errors = array();

	if(!empty($_POST))
	{
		$email = $mysqli->real_escape_string($_POST['email']);

		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}

		if(emailExiste($email))
		{
			$user_id = getValor('id', 'correo', $email);
			$nombre = getValor('nombre', 'correo', $email);

			$token = generaTokenPass($user_id);

			$url = 'http://'.$_SERVER["SERVER_NAME"].'/login/cambia_pass.php?user_id='.$user_id.'&token='.$token;

			$asunto = 'Recuperar Password - Sistema de Usuarios';
			$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";

			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
				echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
				echo "<a href='index.php' >Iniciar Sesion</a>";
				exit;
			}
			} else {
			$errors[] = "La direccion de correo electronico no existe";
		}
	}
?>
