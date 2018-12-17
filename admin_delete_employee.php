<?php
include("connection.php");
session_start();

$id = $_GET['id'];

$deleteEmployee = $connection->prepare("DELETE FROM employee WHERE ID = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();

$_SESSION["message-success"] = "Empleado borrado.";
header("Location: admin_equipo.php");
?>
