<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Reserva #0002138 � Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Reserva #0002138</h1>
  <p class="subtitle reserva-status-subtitle"><b id=subtitle-label>Completada</b><b><i class="material-icons">done</i></b></p>

  <ahref="admin_inicio.php"><i class="material-icons icon-back" id="icon-back-reservas">keyboard_arrow_left</i></a>

<div id="reserva-details">
<p>
Nombre de oferta:  Digi 100<br>
C�digo de oferta:  002826<br>
<br>
Solicitante:  María García<br>
E-mail:  mmartinez1998@gmail.com<br>
Teléfono:  2727883<br>
Mensaje:  <br>
<br><br>
<b> Log de Estados:</b><br>
<br>
29/10/2018 09:38  <span class="completed">completada</span><br>
estado cambiado por:  Francisco González<br>
<br>
27/10/2018 17:38  <span class="in-progress">en proceso</span><br>
estado cambiado por:  Francisco González<br>
<br>
23/10/2018 09:29  <span class="new">nueva reserva</span>
<br>

</p>
</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
