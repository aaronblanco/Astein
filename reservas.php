<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="astein.css">
  <link rel="stylesheet" href="reservas.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Reservas - Administrador</title>
</head>
<body>
  <ul class="navbar">
  <li><img id="astein-logo" src="images/astein_white.png"></li>
  <li> <button type="button" onclick="location.href='admin_inicio.html'" class="navtab">Login</button></li>
  <li> <button type="button" onclick="location.href='admin_inicio.html'" class="navtab">Inicio</button></li>
  <li> <button type="button" onclick="location.href='admin_contacta.html'" class="navtab">Contacta con nosotros</button></li>
  <li> <button type="button" onclick="location.href='admin_equipo.html'" class="navtab">Equipo</button></li>
  <li> <button type="button" onclick="location.href='admin_inicio.html'" class="navtab">Ofertas</button></li>
  <li> <button type="button" onclick="location.href='admin_reserva_detalle.html'" class="navtab">Reservas</button></li>
  <li> <button type="button" onclick="location.href='admin_trabaja.html'" class="navtab">Trabaja con nosotros</button></li>
  </ul>

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
        $query = "SELECT * FROM reservation inner join client on reservation.id_client = client.ID ";
        $result = $connection->query($query);
          while($row = $result->fetch_assoc()){
          ?>
          <tr>
          <td><?php echo $row['timestamp']; ?></td>
          <td><?php echo $row['ID']; ?></td>
          <td><?php echo $row['firstname']; ?></td>
          <td><?php echo $row['lastname']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['message']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><a href = "modify.php?id=<?php echo $row['ID']; ?>">Modificar</a></td>
          </tr>
          <?php } ?>
    </table>

        </div>

      <div id="footer">
      <img class="social-media-icon" src="images/facebook_icon.png" href="facebook.com">
      <img class="social-media-icon" src="images/instagram_icon.png" href="instagram.com">
      </div>
      <div id="footer-right">
      <i class="material-icons icon-white" id="footer-icon">location_on</i>
      <p class="footer-text"> Carretera de Almeria 86 Oficina 5, Huercal De Almeria </p>
      <i class="material-icons icon-white" id="footer-icon">phone</i>
      <p class="footer-text"> +34 601 221 125 </p>
      </div>
      </body>
      </html>
