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
    include "user_feedback.php";

    	if(isset($_SESSION["name"])){
    		header("Location: admin_inicio.php");
    	}

  ?>

<div id="main-content">

  <h1>Login</h1>
  <p class="subtitle">Inicie una nueva sesión con su correo electrónico y contraseña.</p>


  <div id="login-form">
    <form class="astein-form" action="admin_login_check.php" method="post">
      <label>Correo electrónico</label> <input type="email" class="astein-input" name="email"  placeholder="email" required><br>
      <label>Contraseña</label> <input type="password" class="astein-input" name="password" placeholder="contraseña" required><br>
      <input class="save-changes" type="submit" tabindex=1 value="login">


    </form>
  	<form class="astein-form" action="recupera.php" method="post">
  	  <input class="save-changes" type="submit" tabindex=1 value="recuperar contraseña">
  	</form>
  </div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
