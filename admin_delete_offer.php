<?php
include("connection.php");
session_start();

$id = $_GET['id'];

$deleteOffer = $connection->prepare("DELETE FROM offer WHERE ID = ?");
$deleteOffer->bind_param("i", $id);
$deleteOffer->execute();
$deleteOffer->close();

$_SESSION["message-success"] = "Oferta borrada.";
header("Location: admin_ofertas.php");
?>
