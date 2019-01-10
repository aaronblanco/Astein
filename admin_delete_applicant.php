<?php
require 'seguridad.php'; // Acceso solo para el admin
require 'connection.php';
require 'log_function.php';

header('Content-type: text/plain; charset=utf-8');

$id = strip_tags($_GET['id']);

$deleteEmployee = $connection->prepare("DELETE FROM applicant WHERE id = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();
write_log("Eliminado solicitante con $id.");

$_SESSION["message-success"] = "Solicitante borrado.";
header("Location: admin_solicitantes.php");
?>
