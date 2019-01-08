<?php
// require 'seguridad.php'; // Acceso para el admin
require 'connection.php';
include 'log_funcion.php'; // --> Enable logging

header('Content-type: text/plain; charset=utf-8');

$email = $_POST['email'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];

$query_findEmployee = "SELECT * from employee where email='$email'";
$result = $connection->query($query_findEmployee);
if(!$result || mysqli_num_rows($result) == 0 ){
  if($addEmployee = $connection->prepare("INSERT INTO employee (email, firstname, lastname) values (?, ?, ?)")) {
    $addEmployee->bind_param("sss", $email, $name, $lastname);
    $addEmployee->execute();
    $addEmployee->close();
    write_log("Inserted new employee $firstname $lastname with email $email."); // --> Log DB operation
    $_SESSION["message-success"] = "Nuevo empleado $name $lastname creado.";
    header("Location: admin_equipo.php");
  } else {
    printf("Error: %s\n", $connection->error);
  }
} else {
  $_SESSION["message-info"] = "Existe ya un empleado con email $email.";
  header("Location: admin_nuevo_empleado.php");
}
?>
