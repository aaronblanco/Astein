<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Imágenes de Inicio – Administrador</title>
</head>
<body>

  <?php
    require 'seguridad.php'; // Acceso solo para el admin
    include 'admin_navbar.php';
    require 'connection.php';
    include 'user_feedback.php';
  ?>

<div id="main-content">

  <h1>Galería</h1>
  <p class="subtitle">Aquí puede cambiar las imágenes de la galería de inicio.</p>

  <div class="ofertas-container inicio-images">
    <?php
      $query = "SELECT * from photoinicio";
      $result = $connection->query($query);

        while($row = $result->fetch_assoc()){
          $image = $row["image"];
          $id = $row["id"];
          echo '<div class="offer"><a href="admin_edit_inicio_image.php?id='.$id.'"><img alt="Oferta #'.$id.'" title="Oferta #'.$id.'" class="offer-image" src="data:image/jpeg;base64,'.base64_encode($image).'"/></a></div>';
        }
    ?>
  </div>

<div>
<i class="material-icons icon_action plus_icon" onclick="window.location='admin_new_inicio_image.php'">add_box</i>
</div>


</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
