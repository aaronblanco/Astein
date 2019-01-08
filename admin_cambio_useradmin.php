<?php

header('Content-type: text/plain; charset=utf-8');
require "log_function.php";

$pass = strip_tags($_POST['password']);
$user = strip_tags($_POST['user']);

require 'connection.php';

$consulta =  $connection->prepare("UPDATE administrator SET  username = ?, password = ? ");
$consulta->bind_param("ss", $user,  $pass);
$consulta->execute();
$consulta->close();
write_log("Datos del administrador cambiados a Nombre: $user y contraseña: $pass.");

header("Location: admin_useradmin.php");

?>
