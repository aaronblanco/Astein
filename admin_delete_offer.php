<?php
require 'seguridadEmpleado.php'; // Acceso para el admin y los empleados
require 'connection.php';
require 'log_funcion.php';

header('Content-type: text/plain; charset=utf-8');

$id = strip_tags($_GET['id']);

// Look for all reservas where offer.id is this offer
if ($getReservas = $connection->prepare("SELECT id as id_reserva, id_offer FROM reservation WHERE id_offer=? ")) {
  $getReservas->bind_param("i", $id);
  $getReservas->execute();
  $result = $getReservas->get_result();
} else {
  printf("Error: %s\n", $connection->error . $getReservas);
}

if($result and mysqli_num_rows($result) > 0 ) {

  echo "constraints";

  while($row = $result->fetch_assoc()) {
    $reserva_id = $row["id_reserva"];
    echo "$reserva_id";

    // Delete reserva
    $deleteReserva = $connection->prepare("DELETE FROM reservation WHERE ID = ?");
    $deleteReserva->bind_param("i", $reserva_id);
    $deleteReserva->execute();
    $deleteReserva->close();
    echo "deleted";
  }

}

// Look for all photo_inicios where offer.id is this offer
if ($getReservas = $connection->prepare("SELECT id as id_photo, id_offer FROM photoinicio WHERE id_offer=? ")) {
  $getReservas->bind_param("i", $id);
  $getReservas->execute();
  $resultPhoto = $getReservas->get_result();
} else {
  printf("Error: %s\n", $connection->error . $getReservas);
}

if($resultPhoto and mysqli_num_rows($resultPhoto) > 0 ) {

  echo "constraints";

  while($row = $resultPhoto->fetch_assoc()) {
    $id_photo = $row["id_photo"];
    echo "$id_photo";

    // Delete reserva
    $deletePhoto = $connection->prepare("UPDATE photoinicio SET id_offer=NULL WHERE ID = ?");
    $deletePhoto->bind_param("i", $id_photo);
    $deletePhoto->execute();
    $deletePhoto->close();
    echo "deleted";
  }

}

// Now, the offer can be deleted
if ($deleteOffer = $connection->prepare("DELETE FROM offer WHERE ID = ?")) {
  $deleteOffer->bind_param("i", $id);
  $deleteOffer->execute();
  $deleteOffer->close();
  echo "offer deleted";
  write_log("Eliminado oferta con ID $id.");
} else {
  printf("Error: %s\n", $connection->error . $deleteOffer);
}

$_SESSION["message-success"] = "Oferta borrada.";
header("Location: admin_ofertas.php");

?>
