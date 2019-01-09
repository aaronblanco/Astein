<?php

header('Content-type: text/plain; charset=utf-8');

$pass = strip_tags($_POST['password']);
$email = strip_tags($_POST['email']);
$password = md5($pass);
require 'connection.php';
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $consulta =  $connection->prepare("UPDATE administrator SET  email = ?, password = ? ");
      $consulta->bind_param("ss", $email,  $password);
      $consulta->execute();
      $consulta->close();

      header("Location: admin_useradmin.php");
    }

else {
  echo "No es un email valido.";
}



?>
