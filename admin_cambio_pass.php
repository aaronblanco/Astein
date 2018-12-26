<?php
	require_once ("safeConnection.php");
	require_once ("funciones.php");
$servidor = "localhost:8080";
$baseDatos = "astein";
$usuario = "root";
$clave = "";

$pass = $_POST['password'];

include("connection.php");

$consulta = "UPDATE `administrator` SET `password` = $pass ";
$result = $connection->exec($consulta);

    header("Location: admin_contrasena.php");


 ?>
