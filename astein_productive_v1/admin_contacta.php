<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Equipo – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Contacta con nosotros</h1>
  <p class="subtitle">Aquí puede cambiar las informaciones de contacto de la empresa.</p>

<div id="contact-info-form">
  <form class="astein-form" action="/action_page.php" method="post">
    <label>Teléfono</label> <input type="text" class="astein-input" name="phone" value="+34 601 221 125"><br>
    <label>Dirección</label> <input type="text" class="astein-input" name="address" value="Carretera de Almeria 86 Oficina 5, Huercal De Almeria"><br>
    <label>Correo electrónico</label> <input type="text" class="astein-input" name="email" value="dptoinformatico@astein.net"><br>
    <input class="save-changes" type="submit" action="saved_changes.php" method="post" value="guardar cambios">
  </form>
</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
