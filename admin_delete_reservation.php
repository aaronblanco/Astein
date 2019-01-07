<?php
// require 'seguridadEmpleado.php'; // Acceso para admin y empleados
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$id = $_GET['id'];

$deleteReservation = $connection->prepare("DELETE FROM reservation WHERE ID = ?");
$deleteReservation->bind_param("i", $id);
$deleteReservation->execute();
$deleteReservation->close();

$_SESSION["message-success"] = "Reserva borrada.";
header("Location: admin_reservas.php");
?>
