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
write_log("Eliminado empleado con ID $id.");

$_SESSION["message-success"] = "Empleado borrado.";
header("Location: admin_equipo.php");
?>
