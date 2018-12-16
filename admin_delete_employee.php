<?php
include("connection.php");

$id = $_GET['id'];

$deleteEmployee = $connection->prepare("DELETE FROM employee WHERE ID = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();
echo "Empleado borrado.";
header( "refresh:1; url=admin_equipo.php" );

?>
