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
  <title>Nuevo Empleado – Administrador</title>
</head>
<body>

  <?php
    require 'seguridad.php'; // Acceso para el admin
    include "admin_navbar.php";
    include "user_feedback.php";
  ?>

<div id="main-content">

  <h1>Nuevo Empleado</h1>
  <p class="subtitle">Aquí puede crear un nuevo empleado. Después puede añadir informaciones adicionales a este empleado seleccionandolo en la lista.</p>
  <a href="admin_equipo.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>

  <div id="empleado-info-form">
    <form class="astein-form" action="admin_new_employee_process.php" method="post">
      <label>Nombre</label> <input type="text" class="astein-input" name="name" required><br>
      <label>Apellido</label> <input type="text" class="astein-input" name="lastname" required><br>
      <label>Correo electrónico</label> <input type="email" class="astein-input" name="email" required><br>
      <input class="save-changes new-employee-admin" type="submit" action="saved_changes.php" method="post" value="crear empleado">
    </form>
  </div>


</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
