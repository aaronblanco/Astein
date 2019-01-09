<?php
require 'seguridad.php'; // Acceso para el admin
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$email = strip_tags($_POST['email']);
$name = strip_tags($_POST['name'])
$lastname = strip_tags($_POST['lastname']);

$query_findEmployee = "SELECT * from employee where email='$email'";
$result = $connection->query($query_findEmployee);
if(!$result || mysqli_num_rows($result) == 0 ){
  if($addEmployee = $connection->prepare("INSERT INTO employee (email, firstname, lastname) values (?, ?, ?)")) {
    $addEmployee->bind_param("sss", $email, $name, $lastname);
    $addEmployee->execute();
    $addEmployee->close();
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
