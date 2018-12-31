<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Login</h1>
  <p class="subtitle">Inicie una nueva sesión con su correo electrónico y contraseña.</p>

<div id="login-form">
  <form class="astein-form" action="admin_login_check.php" method="post">
    <label>usuario</label> <input type="text" class="astein-input" name="usuario"><br>
    <label>Contraseña</label> <input type="text" class="astein-input" name="password"><br>
    <input class="save-changes" type="submit" action="admin_login_check.php" method="post" tabindex=1 value="login">
    <input class="light-button" id="button-forgot-password" type="button" action="forgot-password.php" method="post" tabindex=2 value="he olvidado mi contraseña">
  </form>
</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
