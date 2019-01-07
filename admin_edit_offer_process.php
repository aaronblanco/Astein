<?php
// require 'seguridad.php'; // Acceso para el admin
// require 'seguridadEmpleado.php'; // Acceso para los empleados
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$name = $_POST['name'];
$provider = $_POST['provider'];
$type = $_POST['type'];
$price = $_POST['price'];
$priceType = $_POST['priceType'];
$data = $_POST['data'];
$dataUnit = $_POST['dataUnit'];
$calls = $_POST['calls'];
$fiber = $_POST['fiber'];
$description = $_POST['description'];

$query_findOffer = "SELECT * from offer where name='$name'";
$result = $connection->query($query_findOffer);
if($result and mysqli_num_rows($result) != 0 ){

  $row = $result->fetch_assoc();
  $id = $row['id'];

  $default_data = 0;
  $default_dataUnit = "GB";
  $default_calls = 0;
  $default_fiber = 0;

  if($addOffer = $connection->prepare("UPDATE offer SET name=?, provider=?, type=?, price=?, priceType=?, data=?, dataUnit=?, calls=?, fiber=?, description=? WHERE `id`=?")) {
    $addOffer->bind_param("sssdsisiisi", $name, $provider, $type, $price, $priceType, $default_data, $default_dataUnit, $default_calls, $default_fiber, $description, $id);
    $addOffer->execute();
    $addOffer->close();

  if (isset($_POST['data_included'])) {
    // Add data to offer
    if($addData = $connection->prepare("UPDATE offer SET data=?, dataUnit=? WHERE `id`=? ")) {
      if (isset($_POST['data_unlimited'])) {
        $data = 99999;
        $dataUnit = "GB";
      }
      $addData->bind_param("isi", $data, $dataUnit, $id);
      $addData->execute();
      $addData->close();
    }
  }
  if (isset($_POST['calls_included'])) {
    // Add data to offer
    if($addCalls = $connection->prepare("UPDATE offer SET calls=? WHERE `id`=? ")) {
      if (isset($_POST['calls_unlimited'])) {
        $calls = 99999;
      }
      $addCalls->bind_param("ii", $calls, $id);
      $addCalls->execute();
      $addCalls->close();
    }
  }
  if (isset($_POST['fiber_included'])) {
    // Add data to offer
    if($addFiber = $connection->prepare("UPDATE offer SET fiber=? WHERE `id`=? ")) {
      $addFiber->bind_param("ii", $fiber, $id);
      $addFiber->execute();
      $addFiber->close();
    }
  }
    $_SESSION["message-success"] = "Oferta ".'"'.$name.'"'." editada.";
    header("Location: admin_ofertas.php");
  } else {
    printf("Error: %s\n", $connection->error);
  }
} else {
  $_SESSION["message-warning"] = "Esta oferta no existe.";
  header("Location: admin_ofertas.php"); //--> mejor: admin_nueva_oferta, pero mensaje no funciona en esta página
}
?>
