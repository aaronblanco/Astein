<?php
// require 'seguridad.php'; // Acceso solo para el admin
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$id = $_GET['id'];

$deleteEmployee = $connection->prepare("DELETE FROM applicant WHERE ID = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();

$_SESSION["message-success"] = "Solicitante borrado.";
header("Location: admin_trabaja.php");
?>
