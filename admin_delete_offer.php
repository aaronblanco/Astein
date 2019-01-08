<?php
require 'seguridadEmpleado.php'; // Acceso para el admin y los empleados
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$id = strip_tags($_GET['id']);

$deleteOffer = $connection->prepare("DELETE FROM offer WHERE ID = ?");
$deleteOffer->bind_param("i", $id);
$deleteOffer->execute();
$deleteOffer->close();

$_SESSION["message-success"] = "Oferta borrada.";
header("Location: admin_ofertas.php");
?>
