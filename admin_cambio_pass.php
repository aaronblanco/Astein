<?php
require 'seguridad.php'; // Acceso para el admin
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$pass = strip_tags($_POST['password']);


$consulta = $connection->prepare("UPDATE company SET team_password = ? ");
$consulta->bind_param("s", $pass);
$consulta->execute();
$consulta->close();

$_SESSION["message-success"] = "Contraseña de equípo cambiada.";
header("Location: admin_contrasena.php");

 ?>
