<?php
// require 'seguridad.php'; // Acceso solo para el admin
require 'connection.php';
session_start();

header('Content-type: text/plain; charset=utf-8');

$id = $_GET['id'];

$deleteEmployeeImage = $connection->prepare("UPDATE employee SET image=NULL WHERE id = ?");
$deleteEmployeeImage->bind_param("i", $id);
$deleteEmployeeImage->execute();
$deleteEmployeeImage->close();

$_SESSION["message-success"] = "Imagen borrado.";
header("Location: admin_empleado.php?id=$id");
?>
