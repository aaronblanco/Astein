<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Reservas - Administrador</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
  ?>

  <div id="main-content">

  <h1>Reservas hechas por los clientes</h1>
  <table>
    <tr>
        <th>Fecha</th>
        <th>Referencia</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo Electrónico</th>
        <th>Teléfono</th>
        <th style="width:33%; word-wrap: word-break">Mensaje</th>
        <th>Estado</th>
        <th>Modificar reserva</th>
        </tr>
        <?php
          include('connection.php');
          $query = "SELECT * FROM reservation inner join client on reservation.id_client = client.id ";
          $result = $connection->query($query);
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
            <td><?php echo $row['timestamp']; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a href = "modify.php?id=<?php echo $row['id']; ?>">Modificar</a></td>
            </tr>
            <?php } ?>
      </table>

          </div>

        <?php
          include "usuario_footer.php";
        ?>

</body>
</html>
