<?php
require 'seguridadEmpleado.php'; // Acceso para admin y empleados
require 'connection.php';
require 'log_funcion.php';

header('Content-type: text/plain; charset=utf-8');

$id = strip_tags($_GET['id']);

$deleteReservation = $connection->prepare("DELETE FROM reservation WHERE ID = ?");
$deleteReservation->bind_param("i", $id);
$deleteReservation->execute();
$deleteReservation->close();
write_log("Eliminado reserva con ID $id.");

$_SESSION["message-success"] = "Reserva borrada.";
header("Location: admin_reservas.php");
?>
