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
    // require 'seguridad.php'; // Acceso para el admin (--> no tiene sentido en esta página)
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Usuario y contraseña</h1>
  <p class="subtitle">Aquí puede cambiar el nombre de usuario y contraseña del administrador.</p>

<div id="team-password-form">
  <form class="astein-form" action="admin_cambio_useradmin.php" method="post">
      <label>Usuario</label> <input type="text" class="astein-input" name="user" value="admin"><br>
      <label>Contraseña</label> <input type="text" class="astein-input" name="password" value="astein2018##"><br>
      <input class="save-changes" type="submit" action="admin_cambio_useradmin.php" method="post" value="guardar cambios">
  </form>
</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
