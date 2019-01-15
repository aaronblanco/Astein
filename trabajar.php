<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images/astein_icon.png"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Trabaja con nosotros</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
    include "user_feedback.php";
  ?>

<div id="main-content">

<h1>Trabaja con nosotros </h1>
<form class="astein-form" action="trabajar_process.php" method="POST" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Nombre" required>
  <input type="text" name="lastname" placeholder="Apellidos" required>
  <input type="tel" name="phone" placeholder="Número de teléfono" required>
  <input type="email" name="mail" placeholder="Correo electrónico" required>
  <br>
  Curriculum vitae:<br>

  <input type="file" name="fileToUpload" accept="application/pdf" required>

  <br><br>
  <textarea class="mensaje" name="message" maxlength="500" placeholder="Mensaje con información adicional (opcional)"></textarea>
  <input type="submit" value="Enviar">
</form>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
