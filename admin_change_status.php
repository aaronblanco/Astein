<?php
require 'seguridadEmpleado.php'; // Acceso para admin y empleados
require 'connection.php';
require 'log_function.php';

header('Content-type: text/plain; charset=utf-8');

$reservation_id = strip_tags($_POST['reservation_id']);
$status = strip_tags($_POST['status']);

if($editEmployee = $connection->prepare("UPDATE reservation SET status=? WHERE `ID`=? ")) {
  $editEmployee->bind_param("si", $status, $reservation_id);
  $editEmployee->execute();
  $editEmployee->close();
  write_log("Estado de la oferta con ID $reservtion_id cambiado a $status.");
  $_SESSION["message-success"] = "Estado de reserva $reservation_id cambiado.";
  header("Location: admin_reservas.php");
} else {
  printf("Error: %s\n", $connection->error . $editEmployee);
}

?>
