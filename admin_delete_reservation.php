<?php
include("connection.php");
session_start();

$id = $_GET['id'];

$deleteReservation = $connection->prepare("DELETE FROM reservation WHERE ID = ?");
$deleteReservation->bind_param("i", $id);
$deleteReservation->execute();
$deleteReservation->close();

$_SESSION["message-success"] = "Reserva borrada.";
header("Location: admin_reservas.php");
?>
