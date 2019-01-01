<?php
include("connection.php");
if ($connection->connect_error){
  die("Connection failed: " . $connection->connect_error);
}
$message = $_POST['message'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$status = 'pendiente';
$id_offer = $_POST['id'];
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
header("Location: solicitar.php");
 ?>
