<?php
include(connection.php);
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$mail = $_POST['mail'];
//$cv = $_POST['cv']; hay que implementar el subido de archivos pdf
$phone = $_POST['phone'];
$message = $_POST['message'];


$query = "INSERT INTO applicant (firstname, lastname, email, phone, message) values ('$name', '$lastname', '$mail', '$phone', '$message')";

if($connection->query($query)){
	header("Location: trabajar.html");
	//falta un mensaje de verificación del éxito, hay que implementar
} else {
	echo "Failue";
}
 ?>
