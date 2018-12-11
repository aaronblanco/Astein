<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Inicio  Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Inicio</h1>
  <p class="subtitle">Aquí puede cambiar los imagenes que aparecen en la página de inicio.</p>

<div id="admin-inicio-image-list">

<form class="astein-form" action="/action_page.php" method="post">

<div class="admin-inicio-image">
  <p class="inicio-imagename">foto_oferta_digi_500.jpeg</p>
  <i class="material-icons icon-action">cloud_upload</i>
  <i class="material-icons icon-action">delete</i>
  <input type="text" class="filename-input" placeholder="c�digo oferta" name="filename" value="0073833">
  <i class="material-icons icon-arrow">keyboard_arrow_down</i>
</div>
<div class="admin-inicio-image">
  <p class="inicio-imagename">foto_equipo.jpeg</p>
    <i class="material-icons icon-action">cloud_upload</i>
    <i class="material-icons icon-action">delete</i>
    <input type="text" class="filename-input" placeholder="código oferta" name="filename" value="">
    <i class="material-icons icon-arrow">keyboard_arrow_up</i>
    <i class="material-icons icon-arrow">keyboard_arrow_down</i>
</div>
<div class="admin-inicio-image">
  <p class="inicio-imagename">foto_oferta_navidad.jpeg</p>
    <i class="material-icons icon-action">cloud_upload</i>
    <i class="material-icons icon-action">delete</i>
    <input type="text" class="filename-input" placeholder="c�digo oferta" name="filename" value="1899376">
    <i class="material-icons icon-arrow">keyboard_arrow_up</i>
</div>

<div>
<i class="material-icons icon_action plus_icon">add_box</i>
<input type="submit" class="submit_button" action="saved_changes.php" method="post" value="guardar cambios">
</div>

</form>

</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
