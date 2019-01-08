<?php
require 'seguridad.php'; // Acceso para el admin
require 'log_function.php';

header('Content-type: text/plain; charset=utf-8');

$pass = strip_tags($_POST['password']);

require 'connection.php';
// Falta ver la tabla que actualizará la contraseña de todo el equipo.
$consulta =  $connection->prepare("UPDATE employee SET password = ? ");
$consulta->bind_param("s", $pass);
$consulta->execute();
$consulta->close();
write_log("Cambiado contraseña del empleado a $pass.");
header("Location: admin_contrasena.php");


 ?>
