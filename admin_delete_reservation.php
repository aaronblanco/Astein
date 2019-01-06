<?php
include("connection.php");
session_start();

$id = $_GET['id'];

$deleteEmployee = $connection->prepare("DELETE FROM reservation WHERE ID = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();

$_SESSION["message-success"] = "Reserva borrada.";
header("Location: admin_reservas.php");
?>
