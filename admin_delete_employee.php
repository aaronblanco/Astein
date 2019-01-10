<?php
require 'seguridad.php'; // Acceso solo para el admin
require 'connection.php';
require 'log_funcion.php';

header('Content-type: text/plain; charset=utf-8');

$id = strip_tags($_GET['id']);

$deleteEmployee = $connection->prepare("DELETE FROM employee WHERE id = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();
write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                             $_SERVER['REQUEST_URI']. "\nEmpleado con ID $id eliminado","INFO");

$_SESSION["message-success"] = "Empleado borrado.";
header("Location: admin_equipo.php");
?>
