<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/equipo.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Nuestro equipo</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
  ?>

<div id="main-content">
  <div id="table-container">
<h1>Nuestro equipo</h1>
<center>
  <table>
    <tr>
    <td> <img src="images\equipo.jpg""><div class="caption">Nombre Apellidos</div></img></td>
      <td><p>Yo soy nombre apellido, tengo algunos años y soy el jefe aquí. Mis responsilidades son hacer eso y eso y también a veces eso. Nunca hago esto ni aquello</p></td>
    </tr>
    <tr>
    <td style="padding-right:30px"><img src="images\equipo.jpg"><div class="caption">Nombre Apellidos</div></img></td>
    <td><p>Yo soy nombre apellido y trabajo aquí</p></td>
  </tr>
  <tr>
    <td><img src="images\equipo.jpg""><div class="caption">Nombre Apellidos</div></img></td>
    <td><p>Yo soy nombre apellido y trabajo aquí</p></td>
  </tr>
  <tr>
    <td><img src="images\equipo.jpg""><div class="caption">Nombre Apellidos</div></img></td>
    <td><p>Yo soy nombre apellido y trabajo aquí</p></td>
  </tr>
</table>
</center>
</div>
</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
