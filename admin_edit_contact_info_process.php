<?php
require 'seguridad.php'; // Acceso para el admin
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$id = strip_tags($_POST['company_id']);
$email = strip_tags($_POST['email']);
$phone = strip_tags($_POST['phone']);
$address = strip_tags($_POST['address']);

$query_findCompany = "SELECT * from company where id='$id'";
$result = $connection->query($query_findEmployee);
if($editCompany = $connection->prepare("UPDATE company SET email=?, phone=?, address=? WHERE `ID`=? ")) {
  $editCompany->bind_param("sssi", $email, $phone, $address, $id);
  $editCompany->execute();
  $editCompany->close();
  write_log("Cambiado datos de la compañía $id a Correo electrónico: $email, Teléfono: $phone, Dirección: $address.");
  $_SESSION["message-success"] = "Datos de contacto editados.";
  header("Location: admin_contacta.php");
} else {
  printf("Error: %s\n", $connection->error . $editCompany);
}

?>
