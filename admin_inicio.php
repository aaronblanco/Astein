<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Inicio – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";

  ?>

<div id="main-content">

<?php
include("seguridad.php");
if(isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
}
?>
  <?php echo "<h1>¡Bienvenido, ".$name."!</h1>"; ?>
  <p class="subtitle">Elige un enlace del menu para acceder a las funciones diferentes.</p>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
