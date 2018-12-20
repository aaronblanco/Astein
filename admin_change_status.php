<?php

session_start();

include("connection.php");
header('Content-type: text/plain; charset=utf-8');

$reservation_id = $_POST['reservation_id'];
$status = $_POST['status'];

if($editEmployee = $connection->prepare("UPDATE reservation SET status=? WHERE `ID`=? ")) {
  $editEmployee->bind_param("si", $status, $reservation_id);
  $editEmployee->execute();
  $editEmployee->close();
  $_SESSION["message-success"] = "Estado de reserva $reservation_id cambiado.";
  header("Location: admin_reservas.php");
} else {
  printf("Error: %s\n", $connection->error . $editEmployee);
}

?>
