<?php

header('Content-type: text/plain; charset=utf-8');
require "log_funcion.php";
require 'seguridad.php';

$pass = strip_tags($_POST['password']);
$email = strip_tags($_POST['email']);
$password = base64_encode($pass);
require 'connection.php';
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $consulta =  $connection->prepare("UPDATE administrator SET  email = ?, password = ? WHERE id=1");
      $consulta->bind_param("ss", $email,  $password);
      $consulta->execute();
      $consulta->close();
			write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
			                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
			                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
			                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
			                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
			                             $_SERVER['REQUEST_URI']. "\nContraseña del administrador cambiada","INFO");

			$_SESSION["message-success"] = "Se han cambiado los datos de administrador.";
      // header("Location: admin_useradmin.php");
    }

else {
	$_SESSION["message-warning"] = "Datos invalidos.";
	// header("Location: admin_useradmin.php");
}



?>
