<?php
require 'connection.php';
require 'log_function.php';
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
  write_log("Creado un cliente nuevo $name $lastname ($mail) en el processo de realizar una reservar.");
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
write_log("Creado una reserva nueva para cliente $id_client y oferta $id_offer.");
$_SESSION["message-success"] = "Tu solicitud ha sido enviado con éxito.";
header("Location: ofertas.php");
 ?>
