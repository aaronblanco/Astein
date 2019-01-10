<?php
session_start();
require 'connection.php';

$id = strip_tags($_GET['id']);

$findCV = $connection->prepare("SELECT cv FROM applicant WHERE ID = ?");
$findCV->bind_param("i", $id);
$findCV->execute();
$result = $findCV->get_result();

if($result and mysqli_num_rows($result) > 0 ){
  $row = $result->fetch_assoc();
  $pdfdata = $row['cv'];
  header('Content-type: application/pdf');
  echo($pdfdata);
} else {
  $_SESSION["message-warning"] = "PDF no encontrado.";
  header("Location: admin_solicitantes.php");
}

$findCV->close();

?>
