<?php

$pass = $_POST['password'];
$user = $_POST['user'];

include("connection.php");

$consulta =  $connection->prepare("UPDATE `administrator` SET `password` = ?, 'username' = ? ");
$consulta->bind_param("ss", $pass, $user);
$consulta->execute();
$consulta->close();

header("Location: admin_useradmin.php");


 ?>
