<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/solicitar.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Reserva tu oferta</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
  ?>

<div id="main-content">

<h1>Reserva tu oferta ahora</h1>
<div id=datos>
<form action="solicitar.php" method="POST">
<input type="text" placeholder="Nombre" required="true">
<input type="text" placeholder="Apellido" required="true">
<input type="text" placeholder="Correo electrónico" required="true">
<input type="text" placeholder="Telefono" required="true">
<input type="text" placeholder="Mensaje con informacion additional (opcional)" style="height:150px;">
<input type="submit" value="Submit">
</form>
</div>
<p>Usted solo envia una solicitud. No tiene que pagar ning�n coste.</p>
</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
