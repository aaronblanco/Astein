<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/trabajar.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <title>Trabjar con nosotros</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
  ?>

<div id="main-content">

<h1>Trabaja con nosotros </h1>
<form class="astein-form" action="trabajar_process.php" method="POST" enctype="multipart/form-data">
  <input type="text" placeholder="Nombre" required="true">
  <input type="text" placeholder="Apellidos" required="true">
  <input type="text" placeholder="Número de teléfono" required="true">
  <input type="text" placeholder="Correo electrónico" required="true">
  Curriculum Vitae:
  <input type="file" value="CV" required="true">
  <textarea class="mensaje" name="message" placeholder="Mensaje con información adicional (Opcional)"></textarea>
  <input type="submit" value="Enviar">
</form>
<img src="images\equipo.jpg"></img>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
