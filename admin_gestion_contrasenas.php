<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Contraseña – Administrador</title>
</head>
<body>

  <?php
    require 'seguridad.php'; // Acceso solo para el admin
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Contraseñas</h1>
  <p class="subtitle">Aquí puede cambiar su contraseña y la contraseña utilizada de los miembros de su equípo.</p>

  <button type="button" onclick="location.href='admin_useradmin.php'" class="light-icon-button"><i class="material-icons button-icon">build</i>contraseña de administrador</button>
  <br>
  <button type="button" onclick="location.href='admin_contrasena.php'" class="light-icon-button"><i class="material-icons button-icon">group</i>contraseña de equípo</button>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
