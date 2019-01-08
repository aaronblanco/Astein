<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Recuperar contraseña – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
    include "user_feedback.php";

  ?>

<div id="main-content">



    <div id="login-form">

<form class="astein-form" action="recupera_pass.php" method="post">

  <div style="margin-bottom: 25px">
    <input type="email"  class="astein-input" name="email" placeholder="email" required>
  </div>

  <div style="margin-top:10px" >

      <button  class="save-changes" type="submit" method="post" tabindex=1 value="recuperar contraseña">Enviar</a>

  </div>


</form>


</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
