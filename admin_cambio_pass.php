<?php
require 'seguridad.php'; // Acceso para el admin
<<<<<<< HEAD
require 'log_function.php';
=======
require 'connection.php';
>>>>>>> 6197deb5db6e17af248f5d66f6f96d9443f0d01e

header('Content-type: text/plain; charset=utf-8');

$pass = strip_tags($_POST['password']);
<<<<<<< HEAD
=======
$password = md5($pass);
>>>>>>> 6197deb5db6e17af248f5d66f6f96d9443f0d01e

$consulta = $connection->prepare("UPDATE company SET team_password = ? ");
$consulta->bind_param("s", $password);
$consulta->execute();
$consulta->close();
<<<<<<< HEAD
write_log("Cambiado contraseña del empleado a $pass.");
=======

$_SESSION["message-success"] = "Contraseña de equípo cambiada.";
>>>>>>> 6197deb5db6e17af248f5d66f6f96d9443f0d01e
header("Location: admin_contrasena.php");

 ?>
