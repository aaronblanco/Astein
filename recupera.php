

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

  ?>

<div id="main-content">



  <div style="margin-bottom: 25px" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="email" class="form-control" name="email" placeholder="email" required>
  </div>

  <div style="margin-top:10px" class="form-group">
    <div class="col-sm-12 controls">
      <button id="btn-login" type="submit" class="astein-form" value="Recuperar contraseña">Enviar</a>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-12 control">

    </div>
  </div>
</form>




</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
