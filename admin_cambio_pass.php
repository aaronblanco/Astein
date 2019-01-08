<?php
require 'seguridad.php'; // Acceso para el admin

header('Content-type: text/plain; charset=utf-8');

$pass = $_POST['password'];

require 'connection.php';
// Falta ver la tabla que actualizará la contraseña de todo el equipo.
$consulta =  $connection->prepare("UPDATE employee SET password = ? ");
$consulta->bind_param("s", $pass);
$consulta->execute();
$consulta->close();

header("Location: admin_contrasena.php");


 ?>
