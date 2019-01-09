<?php
// require 'seguridad.php'; // Acceso solo para el admin
require 'connection.php';
session_start();

header('Content-type: text/plain; charset=utf-8');

$id = $_GET['id'];

$deleteOfferImage = $connection->prepare("UPDATE offer SET image=NULL WHERE id = ?");
$deleteOfferImage->bind_param("i", $id);
$deleteOfferImage->execute();
$deleteOfferImage->close();

$_SESSION["message-success"] = "Imagen borrado.";
header("Location: admin_oferta_detalle.php?id=$id");
?>
