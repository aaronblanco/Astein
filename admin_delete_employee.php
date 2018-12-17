<?php
include("connection.php");
session_start();

$id = $_GET['id'];

$deleteEmployee = $connection->prepare("DELETE FROM employee WHERE ID = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();

$_SESSION["message-success"] = "Empleado borrado.";

echo("Deleting image of employee $id.");
header("refresh:10; url=admin_empleado.php?id="+$id);
//header("Location: admin_equipo.php");

?>
