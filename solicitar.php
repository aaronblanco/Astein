<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/solicitar.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Reserva tu oferta</title>
</head>
<body>

  <?php
    include "usuario_navbar_responsive.php";
  ?>

<div id="main-content">

<h1>Reserva tu oferta ahora</h1>
<form class="astein-form" action="solicitar_process.php" method="POST">
<input type="text" name="name" placeholder="Nombre" required="true">
<input type="text" name="lastname" placeholder="Apellido" required="true">
<input type="text" name="mail" placeholder="Correo electrónico" required="true">
<input type="number" name="phone" placeholder="Telefono" required="true">
<textarea class="mensaje" name="message" placeholder="Mensaje con información adicional (Opcional)"></textarea>
<input type="submit" value="Submit">
</form>
<p>Usted solo envia una solicitud. No tiene que pagar ningún coste.</p>
</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
