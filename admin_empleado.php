<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Editar Empleado – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Empleado: Francisco Javier</h1>
  <p class="subtitle">Aquí puede editar el empleado en detalle.</p>
  <a href="admin_equipo.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>

  <div id="empleado-info-form">
    <form class="astein-form" action="/action_page.php" method="post">
        <label id="image-label">Image</label><br>
      <div id="employee-image-container">
        <img class="employee-image" src="https://go.forrester.com/wp-content/uploads/Sam-Stern_150x150.png">
        <button class="light-icon-button"><i class="material-icons button-icon">cloud_upload</i>cambiar imagen</button>
        <button class="light-icon-button" id="delete-image"><i class="material-icons button-icon">delete</i>borrar imagen</button>
      </div>
      <label>Correo electrónico</label> <input type="text" class="astein-input" name="email" value="f.javier@astein.net"><br>
      <label>Nombre</label> <input type="text" class="astein-input" name="name" value="Francisco Javier"><br>
      <label>Apellido</label> <input type="text" class="astein-input" name="name" value="Ramírez González"><br>
      <label>Actividad</label> <input type="text" class="astein-input" name="activity" value="administración"><br>
      <label>Descripción</label>
      <textarea class="admin-textarea" name="description">Mi responsabilidad es la gestión de la empresa y de nuestros empleados.</textarea>
      <input class="save-changes save-changes-admin" type="submit" action="saved_changes.php" method="post" value="guardar cambios">

    </form>
  </div>


</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
