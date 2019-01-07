<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Reserva tu oferta</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
    require 'connection.php';
    $id = $_GET['id'];
  ?>

<div id="main-content">

<h1>Reserva tu oferta ahora</h1>
<form class="astein-form" action="solicitar_process.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="text" name="name" placeholder="Nombre" required="true">
<input type="text" name="lastname" placeholder="Apellidos" required="true">
<input type="email" name="mail" placeholder="Correo electrónico" required="true">
<input type="tel" name="phone" placeholder="Telefono" required="true">
<textarea name="message" maxlength="500" placeholder="Mensaje con información adicional (opcional)"></textarea>
<input type="submit" value="Solicitar ahora">
</form>
<p>Solo envias una solicitud. No tienes que pagar ningún coste.</p>
</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
