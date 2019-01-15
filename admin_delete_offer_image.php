<?php
// require 'seguridad.php'; // Acceso solo para el admin
require 'connection.php';
require 'log_funcion.php';
session_start();

header('Content-type: text/plain; charset=utf-8');

$id = $_GET['id'];

$deleteOfferImage = $connection->prepare("UPDATE offer SET image=NULL WHERE id = ?");
$deleteOfferImage->bind_param("i", $id);
$deleteOfferImage->execute();
$deleteOfferImage->close();
write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                             $_SERVER['REQUEST_URI']. "\nFoto de la oferta con ID $id eliminada","INFO");

$_SESSION["message-success"] = "Imagen borrado.";
header("Location: admin_oferta_detalle.php?id=$id");
?>
