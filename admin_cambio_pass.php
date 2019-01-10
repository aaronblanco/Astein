<?php
require 'seguridad.php'; // Acceso para el admin
require 'connection.php';
require 'log_funcion.php';

header('Content-type: text/plain; charset=utf-8');

$pass = strip_tags($_POST['password']);
$password = base64_encode($pass);

$consulta = $connection->prepare("UPDATE company SET team_password = ? ");
$consulta->bind_param("s", $password);
$consulta->execute();
$consulta->close();
write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                             $_SERVER['REQUEST_URI']. "\nContraseña del equipo cambiada","INFO");

$_SESSION["message-success"] = "Contraseña de equípo cambiada.";
header("Location: admin_contrasena.php");

 ?>
