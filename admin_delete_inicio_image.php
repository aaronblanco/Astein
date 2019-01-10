<?php
// require 'seguridad.php'; // Acceso solo para el admin
require 'connection.php';
session_start();

header('Content-type: text/plain; charset=utf-8');

$id = $_GET['id'];

$deleteOfferImage = $connection->prepare("DELETE from photoinicio WHERE id = ?");
$deleteOfferImage->bind_param("i", $id);
$deleteOfferImage->execute();
$deleteOfferImage->close();

$_SESSION["message-success"] = "Imagen eliminado.";
header("Location: admin_imagenes.php");
?>
