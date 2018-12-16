<?php
include("connection.php");
if ($connection->connect_error){
  die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['id'];

$deleteEmployee = $connection->prepare("DELETE FROM employee WHERE ID = ?");
$deleteEmployee->bind_param("i", $id);
$deleteEmployee->execute();
$deleteEmployee->close();
echo "Empleado borrado.";
header( "refresh:1; url=admin_equipo.php" );

?>
