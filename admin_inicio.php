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
    require 'seguridad.php'; // Acceso para el admin
    require 'seguridadEmpleado.php'; // Acceso para los empleados
    include 'admin_navbar.php';
  ?>

<div id="main-content">

<?php
  $name = $_SESSION['name'];
  echo "<h1>¡Bienvenido, ".$name."!</h1>";
?>

  <p class="subtitle">Elige un enlace del menu para acceder a las funciones diferentes.</p>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
