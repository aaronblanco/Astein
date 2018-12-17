<?php

session_start();

include("connection.php");
header('Content-type: text/plain; charset=utf-8');

$id = $_GET['id'];
$email = $_POST['email'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$activity = $_POST['activity'];
$description = $_POST['description'];
// --> Missing: foto (ftp-upload --> link to photo location in file system)

$query_findEmployee = "SELECT * from employee where id='$id'";
$result = $connection->query($query_findEmployee);
if($editEmployee = $connection->prepare("UPDATE employee SET email=?, name=?, lastname=?, activity=?, description=? WHERE `ID`=? ")) {
  $editEmployee->bind_param("sssssi", $email, $name, $lastname, $activity, $description, $id);
  $editEmployee->execute();
  $editEmployee->close();
  $_SESSION["message-success"] = "Empleado editado.";
  header("Location: admin_equipo.php");
} else {
  printf("Error: %s\n", $connection->error . $editEmployee);
}

?>
