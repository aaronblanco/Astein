<?php
require 'seguridad.php'; // Acceso solo para el admin
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$id = $_GET['id'];

$deleteEmployee = $connection->prepare("DELETE FROM employee WHERE id = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();

$_SESSION["message-success"] = "Empleado borrado.";
header("Location: admin_equipo.php");
?>
