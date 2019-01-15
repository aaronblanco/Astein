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
write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                             $_SERVER['REQUEST_URI']. "\nReserva con ID $id eliminada","INFO");

$_SESSION["message-success"] = "Reserva borrada.";
header("Location: admin_reservas.php");
?>
