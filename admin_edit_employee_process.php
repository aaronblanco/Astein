<?php
require 'seguridad.php'; // Acceso para el admin
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$id = strip_tags($_GET['id']);
$email = strip_tags($_POST['email']);
$name = strip_tags($_POST['name']);
$lastname = strip_tags($_POST['lastname']);
$activity = strip_tags($_POST['activity']);
$description = strip_tags($_POST['description']);
// --> Missing: foto (ftp-upload --> link to photo location in file system)

// $query_findEmployee = "SELECT * from employee where id='$id'";
// $result = $connection->query($query_findEmployee);
if($editEmployee = $connection->prepare("UPDATE employee SET email=?, firstname=?, lastname=?, activity=?, description=? WHERE `id`=? ")) {
  $editEmployee->bind_param("sssssi", $email, $name, $lastname, $activity, $description, $id);
  $editEmployee->execute();
  $editEmployee->close();
  write_log("Cambiado datos del empleado con ID $id a Correo electrónico: $email, Nombre: $name, Apellido: $lastname, Actividad: $activity, Descripción: $description.");
  $_SESSION["message-success"] = "Empleado editado.";
  header("Location: admin_equipo.php");
} else {
  printf("Error: %s\n", $connection->error . $editEmployee);
}

?>
