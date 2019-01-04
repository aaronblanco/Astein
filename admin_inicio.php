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
  <title>Página de Inicio – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
  ?>

<div id="main-content">

  <h1>Inicio</h1>
  <p class="subtitle">Aquí puede cambiar los imagenes que aparecen en la página de inicio.</p>
  <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        <h4>Necesitas estar conectado para acceder aquí.</h4>
        <p><a href='admin_login.php'>Iniciar sesion</a></p></div>";
        exit;
    }
        // checking the time now when home page starts
        $now = time();
        if ($now > $_SESSION['expire'] )
        {
            session_destroy();
            echo "<div class='alert alert-danger' role='alert'>
            <h4>Tu sesion ha terminado.</h4>
            <p><a href='admin_login.php'>Iniciar sesion</a></p></div>";
            exit;
        }
    ?>
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
