<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Reservas - Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
    include "connection.php";
    include "user_feedback.php";
  ?>

  <div id="main-content">

  <h1>Reservas</h1>
  <table class="large-table">
    <tr>
        <th>Fecha</th>
        <th>ID</th>
        <th>Oferta</th>
        <th>Nombre</th>
        <th>Correo Electrónico</th>
        <th>Teléfono</th>
        <th>Mensaje</th>
        <th>Estado</th>
        <th>Opciones</th>
        </tr>
        <?php
          $query = "SELECT reservation.id as reservation_id, reservation.timestamp, reservation.message, reservation.status,
          offer.name as offer_name, firstname, lastname, email, phone FROM reservation
          INNER JOIN client on reservation.id_client = client.ID INNER JOIN offer on reservation.id_offer = offer.id";
          $result = $connection->query($query);
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
            <td><?php echo $row['timestamp']; ?></td>
            <td><?php echo $row['reservation_id']; ?></td>
            <td><?php echo $row['offer_name']; ?></td>
            <td><?php echo($row['firstname'].' '.$row['lastname']); ?></td>
            <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
            <td><?php echo $row['phone']; ?></td>
            <?php if ($row['message'] != "") {
              echo('<td class="table-message">'.substr($row['message'], 0, 50).'...'.'</td>');
            } else {
              echo ('<td> </td>');
            }
            if ($row['status']=="new") {
              echo('<td class="status-field"><span class="status-new">nueva</span></td>');
            } elseif ($row['status']=="in progress") {
              echo('<td class="status-field"><span class="status-in-progress">en&nbsp;proceso</span></td>');
            } else {
              echo('<td class="status-field"><span class="status-completed">completada</span></td>');
            }
            ?>
            <td class="reservas-list-options">
              <a href="admin_reserva_detalle.php?id=<?php echo $row["reservation_id"] ?>"><i class="material-icons icon-action icon-table icon-reservas">edit</i></a><i class="material-icons icon-action icon-table icon-reservas" onclick="askDeleteReservation(<?php echo $row["reservation_id"] ?>)">delete</i>
            </td>
            </tr>
            <?php } ?>
      </table>

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

        <?php
          include "admin_footer.php";
        ?>

</body>
</html>
