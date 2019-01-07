<?php

header('Content-type: text/plain; charset=utf-8');

$pass = $_POST['password'];
$user = $_POST['user'];

require 'connection.php';

$consulta =  $connection->prepare("UPDATE administrator SET  username = ?, password = ? ");
$consulta->bind_param("ss", $user,  $pass);
$consulta->execute();
$consulta->close();

header("Location: admin_useradmin.php");

?>
