<?php
include("connection.php");
session_start();

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
if(!$result || mysqli_num_rows($result) == 0 ){
  $default_data = 0;
  $default_dataUnit = "GB";
  $default_calls = 0;
  $default_fiber = 0;
  if($addOffer = $connection->prepare("INSERT INTO offer (name, provider, type, price, priceType, data, dataUnit, calls, fiber, description) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
    $addOffer->bind_param("sssdsisiis", $name, $provider, $type, $price, $priceType, $default_data, $default_dataUnit, $default_calls, $default_fiber, $description);
    $addOffer->execute();
    $addOffer->close();

  if (isset($_POST['data_included'])) {
    echo "Data set.";
    // Get ID of created offer
    $query_findOffer = "SELECT id from offer where name='$name'";
    $result = $connection->query($query_findOffer);
    $row = $result->fetch_assoc();
    $id = $row['id'];
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
    echo "Calls set.";
    // Get ID of created offer
    $query_findOffer = "SELECT id from offer where name='$name'";
    $result = $connection->query($query_findOffer);
    $row = $result->fetch_assoc();
    $id = $row['id'];
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
    echo "Fiber set.";
    // Get ID of created offer
    $query_findOffer = "SELECT id from offer where name='$name'";
    $result = $connection->query($query_findOffer);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    // Add data to offer
    if($addFiber = $connection->prepare("UPDATE offer SET fiber=? WHERE `id`=? ")) {
      $addFiber->bind_param("ii", $fiber, $id);
      $addFiber->execute();
      $addFiber->close();
    }
  }
    $_SESSION["message-success"] = "Nueva oferta ".'"'.$name.'"'." creada.";
    header("Location: admin_ofertas.php");
  } else {
    printf("Error: %s\n", $connection->error);
  }
} else {
  $_SESSION["message-warning"] = "Existe ya una oferta con este nombre.";
  header("Location: admin_ofertas.php"); //--> mejor: admin_nueva_oferta, pero mensaje no funciona en esta página
}
?>