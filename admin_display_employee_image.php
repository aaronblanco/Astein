<?php
session_start();
require 'connection.php';

$id = strip_tags($_GET['id']);

$findEmployee = $connection->prepare("SELECT image FROM employee WHERE ID = ?");
$findEmployee->bind_param("i", $id);
$findEmployee->execute();
$result = $findEmployee->get_result();

if($result and mysqli_num_rows($result) > 0 ){
  $row = $result->fetch_assoc();
  $imagedata = $row['image'];
  header('Content-type: image/*');
  echo($imagedata);
} else {
  echo "Imagen no encontrado.";
}

$findEmployee->close();

?>
