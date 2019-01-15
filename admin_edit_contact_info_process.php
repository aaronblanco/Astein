<?php
require 'seguridad.php'; // Acceso para el admin
require 'connection.php';
require 'log_funcion.php';

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
  write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                               "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                               ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                               $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                               $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                               $_SERVER['REQUEST_URI']. "\nDatos de la empresa $id cambiados a Correo electrónico: $email, Teléfono: $phone, Dirección: $address.","INFO");

  $_SESSION["message-success"] = "Datos de contacto editados.";
  header("Location: admin_contacta.php");
} else {
  write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                               "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                               ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                               $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                               $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                               $_SERVER['REQUEST_URI']. "\nError en cambiar datos de la empresa con ID $id","ERROR");
  printf("Error: %s\n", $connection->error . $editCompany);
}

?>
