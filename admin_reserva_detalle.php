<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Reserva Detalle – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
    include "connection.php";
    session_start();

    $reserva_id = $_GET['id'];

    $query_findReserva = "SELECT reservation.id as reservation_id, reservation.timestamp, reservation.message, reservation.status,
    offer.name as offer_name, offer.id as offer_id, firstname, lastname, email, phone FROM reservation
    INNER JOIN client on reservation.id_client = client.ID INNER JOIN offer on reservation.id_offer = offer.id
    WHERE reservation.id = $reserva_id";
    $result = $connection->query($query_findReserva);

    if(mysqli_num_rows($result) > 0 ){
      $row = $result->fetch_assoc();
      $reservation_id = $row['reservation_id'];
    } else {
        printf("Esta Reserva no existe. </br> Error: %s\n", $connection->error);
    }
  ?>

<div id="main-content">

  <?php
  if ($row['status']=="new") {
    echo('<h1><span class="status-new status-detail">Reserva #'.$reservation_id.'</span></h1>');
  } elseif ($row['status']=="in progress") {
    echo('<h1><span class="status-in-progress status-detail">Reserva #'.$reservation_id.'</span></h1>');
  } else {
    echo('<h1><span class="status-completed status-detail">Reserva #'.$reservation_id.'</span></h1>');
  }
  ?></h1>

  <a href="admin_reservas.php"><i class="material-icons icon-back" id="icon-back-reservas">keyboard_arrow_left</i></a>

<div id="reserva-details">
<p>
<b>Fecha y hora:</b>  <?php echo $row['timestamp'] ?><br><br>
<b>Nombre de oferta:</b>  <?php echo $row['offer_name'] ?><br>
<b>Código de oferta:</b>  <?php echo $row['offer_id'] ?><br>
<br>
<b>Solicitante:</b>  <?php echo $row['firstname'].' '.$row['lastname'] ?> <br>
<b>Email:</b>  <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a><br>
<?php if ($row['phone'] != "") {
  echo('<b>Teléfono:</b> '.$row['phone'].'<br>');
} else {
  echo('<b>Teléfono:</b> – <br>');
}
echo '<br>';
if ($row['message'] != "") {
  echo('<b>Message:</b>  <p id="reservation-detail-message">'.$row['message'].'</p>');
} else {
  echo('<b>Message:</b> – <br><br>');
}
?>

<b>Estado:</b>
<form class="astein-form" method="post" action="admin_change_status.php">
  <select name="status" style="display: inline;">
    <option value="new">nueva</option>
    <option value="in progress">en proceso</option>
    <option value="completed">completada</option>
  </select>
  <input type="hidden" id="reservation_id" name="reservation_id" value="<?php echo $reservation_id ?>">
  <input id="status-change-button" class="save-changes" type="submit" method="post" value="cambiar estado">
</form>
<br>
<button class="light-icon-button" id="delete-reservation" onclick="askDeleteReservation(<?php echo $reservation_id ?>);"><i class="material-icons button-icon">delete</i>borrar reserva</button>

</p>
</div>

<script>
function askDeleteReservation(reservationID) {
    var c = confirm("¿Eliminar esta reserva?");
    if (c == true) {
      window.location.replace("admin_delete_reservation.php"+"?id="+reservationID);
    } else {
  }
}
</script>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
