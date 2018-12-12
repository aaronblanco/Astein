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
$id_offer = 1;
$id_client;

$query_findUser = "SELECT * from client where email='$mail'";
$result = $connection->query($query_findUser);
if(mysqli_num_rows($result) > 0 ){
  $row = $result->fetch_assoc();
  $id_client = $row['ID'];
} else {
  $addUser = $connection->prepare("INSERT INTO client (firstname, lastname, email, phone) values (?, ?, ?, ?)");
  $addUser->bind_param("sssi", $name, $lastname, $mail, $phone);
  $addUser->execute();
  $addUser->close();
  $result = $connection->query($query_findUser);
  $row =  $result->fetch_assoc();
  $id_client = $row['ID'];
}
$query = $connection->prepare("INSERT INTO reservation (status, message, id_offer, id_client) values (?, ?, ?, ?)");
$query->bind_param("ssii", $status, $message, $id_offer, $id_client);
$query->execute();
$query->close();
header("Location: solicitar.php");
 ?>
