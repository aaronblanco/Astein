<?php
require 'seguridadEmpleado.php'; // Acceso para admin y empleados
require 'connection.php';
require 'log_funcion.php';

header('Content-type: text/plain; charset=utf-8');

$reservation_id = strip_tags($_POST['reservation_id']);
$status = strip_tags($_POST['status']);

if($editEmployee = $connection->prepare("UPDATE reservation SET status=? WHERE `ID`=? ")) {
  $editEmployee->bind_param("si", $status, $reservation_id);
  $editEmployee->execute();
  $editEmployee->close();
  write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                               "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                               ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                               $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                               $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                               $_SERVER['REQUEST_URI']. "\n Estado de la reserva con ID $reservtion_id cambiado a $status.","INFO");
  $_SESSION["message-success"] = "Estado de reserva $reservation_id cambiado.";
  header("Location: admin_reservas.php");
} else {
  write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                               "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                               ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                               $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                               $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                               $_SERVER['REQUEST_URI']. "\n Error en cambiar el estado de la reserva $reservtion_id.","ERROR");
  printf("Error: %s\n", $connection->error . $editEmployee);

}

?>
