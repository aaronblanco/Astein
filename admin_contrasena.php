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
    include "user_feedback.php";
    require 'connection.php';
  ?>

<div id="main-content">

  <h1>Contraseña de Equipo</h1>
  <p class="subtitle">Aquí puede cambiar la contraseña utilizada de los miembros de su equipo.</p>

  <a href="admin_gestion_contrasenas.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>
  <br>

  <?php
  $query_findPassword = "SELECT team_password from company where id='1'";
  $result = $connection->query($query_findPassword);
  $row = $result->fetch_assoc();
  $team_password = $row['team_password'];
  ?>

<div id="team-password-form">
  <form class="astein-form" action="admin_cambio_pass.php" method="post">
      <label>Contraseña</label> <input type="password" class="astein-input" name="password" placeholder="<?php echo md5($team_password) ?>" required><br>
      <input class="save-changes" type="submit" action="admin_cambio_pass.php" method="post" value="guardar cambios">
  </form>
</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
