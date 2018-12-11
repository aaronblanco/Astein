<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Equipo  Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Equipo</h1>
  <p class="subtitle">Aquí puede cambiar las informaciones sobre sus empleados.</p>

<div id="admin-inicio-image-list">

<form class="astein-form" action="/action_page.php" method="post">

<div class="admin-inicio-image admin-equipo">
  <p class="inicio-imagename employee-name">Francisco Javier Ramírez González</p>
  <a href="admin_empleado.php"><i class="material-icons icon-action">edit</i></a>
  <i class="material-icons icon-action" onclick="myFunction()">delete</i>
  <i class="material-icons icon-arrow">keyboard_arrow_down</i>
</div>
<div class="admin-inicio-image admin-equipo">
  <p class="inicio-imagename employee-name">Marta Frías de Vega Carpio</p>
    <i class="material-icons icon-action">edit</i>
    <i class="material-icons icon-action">delete</i>
    <i class="material-icons icon-arrow">keyboard_arrow_up</i>
    <i class="material-icons icon-arrow">keyboard_arrow_down</i>
</div>

<div>
<a href="admin_nuevo_empleado.php"><i class="material-icons icon-action plus_icon" id="new-employee">add_box</i></a>
<input type="submit" class="submit_button" action="saved_changes.php" method="post" value="guardar cambios">
</div>

</form>

</div>

</div>

<script>
function myFunction() {
    confirm("¿Eliminar este empleado?");
}
</script>

<?php
  include "admin_footer.php";
?>

</body>
</html>
