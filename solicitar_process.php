<?php
require 'connection.php';
require 'log_funcion.php';
session_start();
$message = strip_tags($_POST['message']);
$name = strip_tags($_POST['name']);
$lastname = strip_tags($_POST['lastname']);
$phone = strip_tags($_POST['phone']);
$mail = strip_tags($_POST['mail']);
$status = 'new';
$id_offer = strip_tags($_POST['id']);
$id_client;

$query_findUser = $connection->prepare("SELECT * from client where email=?");
$query_findUser->bind_param("s", $mail);
$query_findUser->execute();
$result = $query_findUser->get_result();
if(mysqli_num_rows($result) > 0 ){
  $row = $result->fetch_assoc();
  $id_client = $row['id'];
} else {
  $addUser = $connection->prepare("INSERT INTO client (firstname, lastname, email, phone) values (?, ?, ?, ?)");
  $addUser->bind_param("sssi", $name, $lastname, $mail, $phone);
  $addUser->execute();
  $addUser->close();
  write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                               "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                               ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                               $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                               $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                               $_SERVER['REQUEST_URI']. "\nCreado un cliente nuevo $name $lastname ($mail) en el processo de realizar una reservar.","INFO");

  $query_findUser->execute();
  $result = $query_findUser->get_result();
  $row =  $result->fetch_assoc();
  $id_client = $row['id'];
  $query_findUser->close();

}
$query = $connection->prepare("INSERT INTO reservation (status, message, id_offer, id_client) values (?, ?, ?, ?)");
$query->bind_param("ssii", $status, $message, $id_offer, $id_client);
$query->execute();
$query->close();
write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                             $_SERVER['REQUEST_URI']. "\nCreado una reserva nueva para cliente $id_client y oferta $id_offer.","INFO");

$_SESSION["message-success"] = "Tu solicitud ha sido enviado con éxito.";
header("Location: ofertas.php");
 ?>
