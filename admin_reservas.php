<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/admin_reservas.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Reservas - Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
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
      <th>Borrar reserva</th>
      </tr>
      <tr>
        <td>19.10.2018</td>
        <td>RR4290290</td>
        <td>Marta</td>
        <td>Gonzalez Lopez</td>
        <td>mgl@algo.es</td>
        <td>+3489302012</td>
        <td></td>
        <td>Abierta</td>
        <td style="text-decoration:underline">Borrar</td>
      </tr>
      <tr>
          <td>21.10.2018</td>
          <td>RR49876290</td>
          <td>Juan</td>
          <td>Valdez Garcia</td>
          <td>juanvg@algo.es</td>
          <td>+3489392012</td>
          <td>Hay esta oferta a un precio más bajo?</td>
          <td>Pendiente</td>
          <td style="text-decoration:underline">Borrar</td>
      </tr>
      <tr>
          <td>22.10.2018</td>
          <td>RX23490</td>
          <td>Jose</td>
          <td>Isai Franco</td>
          <td>xyz@algo.es</td>
          <td>+3403922012</td>
          <td></td>
          <td>Realizado</td>
          <td style="text-decoration:underline">Borrar</td>
      </tr>
          </table>

        </div>

        <?php
          include "admin_footer.php";
        ?>
        
</body>
</html>
