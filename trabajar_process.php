<?php
include("connection.php");
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$mail = $_POST['mail'];
//$cv = $_POST['cv']; hay que implementar el subido de archivos pdf
$phone = $_POST['phone'];
$message = $_POST['message'];


$query = $connection->prepare("INSERT INTO applicant (firstname, lastname, email, phone, message) values (?,?,?,?,?)");
$query->bind_param("sssis", $name, $lastname, $mail, $phone, $message)
$query->execute();
$query->close();
header("Location: trabajar.html");
?>
