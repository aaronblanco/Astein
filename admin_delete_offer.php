<?php
require 'seguridadEmpleado.php'; // Acceso para el admin y los empleados
require 'connection.php';
require 'log_funcion-php';

header('Content-type: text/plain; charset=utf-8');

$id = strip_tags($_GET['id']);

$deleteOffer = $connection->prepare("DELETE FROM offer WHERE id = ?");
$deleteOffer->bind_param("i", $id);
$deleteOffer->execute();
$deleteOffer->close();
write_log("Eliminado oferta con ID $id.");

$_SESSION["message-success"] = "Oferta borrada.";
header("Location: admin_ofertas.php");
?>
