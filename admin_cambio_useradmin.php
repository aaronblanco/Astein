<?php

header('Content-type: text/plain; charset=utf-8');
require "log_funcion.php";

$pass = strip_tags($_POST['password']);
$email = strip_tags($_POST['email']);
$password = md5($pass);
require 'connection.php';
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $consulta =  $connection->prepare("UPDATE administrator SET  email = ?, password = ? ");
      $consulta->bind_param("ss", $email,  $password);
      $consulta->execute();
      $consulta->close();
			write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
			                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
			                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
			                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
			                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
			                             $_SERVER['REQUEST_URI']. "\nContraseña del administrador cambiada","INFO");
      header("Location: admin_useradmin.php");
    }

else {
  echo "No es un email valido.";
}



?>
