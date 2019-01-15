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
  write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                               "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                               ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                               $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                               $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                               $_SERVER['REQUEST_URI']. "\nError en encontrar imagen para empleado con ID $id","ERROR");
}

$findEmployee->close();

?>
