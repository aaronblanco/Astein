<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/trabajar.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Trabjar con nosotros</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
  ?>

<div id="main-content">

<h1>Trabaja con nosotros </h1>
<div class="datos">
<form action="\Astein\trabajar.php" method="POST" enctype="multipart/form-data">
  <input type="text" placeholder="Nombre" required="true">
  <input type="text" placeholder="Apellidos" required="true">
  <input type="text" placeholder="Número de teléfono" required="true">
  <input type="text" placeholder="Correo electrónico" required="true">
  Curriculum Vitae:
  <input type="file" value="CV" required="true">
  <input type="text" placeholder="Mensaje (opcional)" style="height:150px; word-wrap:break-word">
  <input type="submit" value="Enviar">
</form>
</div>
<img src="images\equipo.jpg"></img>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
