<?php
include("connection.php");
if ($connection->connect_error){
  die("Connection failed: " . $connection->connect_error);
}
$mail = $_POST['mail'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];

$query_findUser = "SELECT * from client where email='$mail'";
$result = $connection->query($query_findUser);
if(mysqli_num_rows($result) > 0 ){
  $row = $result->fetch_assoc();
  $id_client = $row['ID'];
} else {
  $addEmployee = $connection->prepare("INSERT INTO employee (email, name, lastname) values (?, ?, ?)");
  $addEmployee->bind_param("sss", $email, $name, $lastname);
  $addEmployee->execute();
  $addEmployee->close();
  $result = $connection->query($query_findEmployee);
  $row =  $result->fetch_assoc();
  $id_employee = $row['ID'];
}
header("Location: admin_equipo.php");
 ?>
