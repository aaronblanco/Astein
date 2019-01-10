<?php
require 'seguridadEmpleado.php'; // Acceso para admin y empleados
require 'connection.php';
require 'log_funcion.php';

header('Content-type: text/plain; charset=utf-8');

$name = strip_tags($_POST['name']);
$provider = strip_tags($_POST['provider']);
$type = strip_tags($_POST['type']);
$price = strip_tags($_POST['price']);
$priceType = strip_tags($_POST['priceType']);
$data = strip_tags($_POST['data']);
$dataUnit = strip_tags($_POST['dataUnit']);
$calls = strip_tags($_POST['calls']);
$fiber = strip_tags($_POST['fiber']);
$description = strip_tags($_POST['description']);

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
    write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                 "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                 ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                 $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                 $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                 $_SERVER['REQUEST_URI']. "\nDatos de la oferta con ID $id cambiados a Nombre: $name, Proveedor: $provider, Tipo: $type, Precio: $price, Tipo_Precio: $priceType, Datos: $default_data $default_dataUnit, Llamadas: $default_calls, Fibra: $default_fiber, Descripción: $description.","INFO");
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
      write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                   "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                   ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                   $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                   $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                   $_SERVER['REQUEST_URI']. "\nDatos incluidos de la oferta con ID $id cambiados a $data $dataUnit","INFO");
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
      write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                   "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                   ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                   $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                   $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                   $_SERVER['REQUEST_URI']. "\nLlamadas de la oferta con ID $id cambiadas a $llamadas","INFO");
    }
  }
  if (isset($_POST['fiber_included'])) {
    // Add data to offer
    if($addFiber = $connection->prepare("UPDATE offer SET fiber=? WHERE `id`=? ")) {
      $addFiber->bind_param("ii", $fiber, $id);
      $addFiber->execute();
      $addFiber->close();
      write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                   "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                   ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                   $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                   $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                   $_SERVER['REQUEST_URI']. "\nFibra de la oferta con ID $id cambiada a $fibre","INFO");
    }
  }
    $_SESSION["message-success"] = "Oferta ".'"'.$name.'"'." editada.";
    header("Location: admin_ofertas.php");
  } else {
    printf("Error: %s\n", $connection->error);
  }
} else {
write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                             $_SERVER['REQUEST_URI']. "\nError en cambiar datos de la oferta con ID $id","ERROR");
  $_SESSION["message-warning"] = "Esta oferta no existe.";
  header("Location: admin_ofertas.php"); //--> mejor: admin_nueva_oferta, pero mensaje no funciona en esta página
}
?>
