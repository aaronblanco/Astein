<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Subir Imagen de Inicio – Administrador</title>
</head>
<body>

  <?php
    require 'seguridad.php'; // Acceso solo para el admin
    include 'admin_navbar.php';
    require 'connection.php';
    include 'user_feedback.php';

    $findOffers = $connection->prepare("SELECT id, name FROM offer");
    $findOffers->execute();
    $resultOffers = $findOffers->get_result();

  ?>

<div id="main-content">

  <h1>Subir nueva imagen a la galería</h1>
  <p class="subtitle">Aquí puede subir una nueva imagen para la galería de inicio.<br>
    Si quiere, puede asignar una oferta para que se cree un enlace directo a esta oferta.
  </p>

  <a href="admin_imagenes.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>

  <br><br><br>

  <div>
    <form class="astein-form" action="admin_new_inicio_image_process.php" method="post" enctype="multipart/form-data">
      <label>Imagen</label><input type="file" name="fileToUpload" accept="image/*"><br><br>
      <label>Oferta asociada</label>
      <select name="id_offer" class="form-select" style="display: inline;">
      <?php
      while($rowOffer = $resultOffers->fetch_assoc()) {
        $id_this_offer = $rowOffer['id'];
        echo "<option value='".$rowOffer['id']."'";
        echo ">Oferta $id_this_offer: ".$rowOffer['name']."</option>'";
      }
      echo "<option value='' selected='selected'>ninguna oferta</option>";
      ?>
      </select>
      <br><br>
      <button type="submit" class="light-icon-button submit-image" style="margin-left: 0px; min-width: 200px;"><i class="material-icons button-icon">done</i>subir imagen</button>
    </form>

</div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
