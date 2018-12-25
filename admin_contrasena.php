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
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Contraseña de Equípo</h1>
  <p class="subtitle">Aquí puede cambiar la contraseña utilizada de los miembros de su equípo.</p>

<div id="team-password-form">
  <form class="astein-form" action="/admin_cambio_pass.php" method="post">
      <label>Contraseña</label> <input type="text" class="astein-input" name="password" value="astein2018##"><br>
      <input class="save-changes" type="submit" action="admin_cambio_pass.php" method="post" value="guardar cambios">
  </form>
</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
