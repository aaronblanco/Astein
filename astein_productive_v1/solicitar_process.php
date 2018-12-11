<?php
include("connection.php");
$message = $_POST['message'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$id_offer = 1;
$id_client;

$query_findUser = "SELECT * from client where email='$mail'";
$result = $connection->query($query_findUser);
if(mysqli_num_rows($result) > 0 ){
  $row = $result->fetch_assoc();
  $id_client = $row['ID'];
} else {
  $addUser = "INSERT INTO client (firstname, lastname, email, phone) values ('$name', '$lastname', '$mail', '$phone')";
  $connection->query($addUser);
  $result = $connection->query($query_findUser);
  $row =  $result->fetch_assoc();
  $id_client = $row['ID'];
}
echo $id_client;
$query = "INSERT INTO reservation (status, message, id_offer, id_client) values ('pendiente', '$message', '$id_offer', '$id_client')";
if($connection->query($query)){
  echo "éxito";
  header("Location: solicitar.html");
} else {
  echo "error while adding reservation";
}
 ?>
