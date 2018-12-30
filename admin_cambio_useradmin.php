<?php

$pass = $_POST['password'];
$user = $_POST['user'];

include("connection.php");

$consulta =  $connection->prepare("UPDATE `administrator` SET  'username' = ?, `password` = ? ");
$consulta->bind_param("ss", $user,  $pass);
$consulta->execute();
$consulta->close();

header("Location: admin_useradmin.php");


 ?>
