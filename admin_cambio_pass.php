<?php

$pass = $_POST['password'];

include("connection.php");
// Falta ver la tabla que actualizará la contraseña de todo el equipo.
$consulta =  $connection->prepare("UPDATE `employee` SET `password` = ? ");
$consulta->bind_param("s", $pass);
$consulta->execute();
$consulta->close();

header("Location: admin_contrasena.php");


 ?>
