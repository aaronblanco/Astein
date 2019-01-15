<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Editar Imagen de Inicio – Administrador</title>
</head>
<body>

  <?php
    require 'seguridad.php'; // Acceso solo para el admin
    include 'admin_navbar.php';
    require 'connection.php';
    include 'user_feedback.php';

    $id = strip_tags($_GET['id']);

    $findOffers = $connection->prepare("SELECT id, name FROM offer");
    $findOffers->execute();
    $resultOffers = $findOffers->get_result();

    $findImage = $connection->prepare("SELECT * FROM photoinicio WHERE ID = ?");
    $findImage->bind_param("i", $id);
    $findImage->execute();
    $result = $findImage->get_result();
    if(!$result or mysqli_num_rows($result) == 0 ) {
      $_SESSION["message-warning"] = "Imagen no encontrado.";
      header("Location: admin_imagenes.php");
    } else {
      $row = $result->fetch_assoc();
      $image = $row['image'];
      $id_offer = $row['id_offer'];
    }
  ?>

<div id="main-content">

  <h1>Editar imagen de galería</h1>
  <p class="subtitle">Aquí puede editar la imagen de inicio y asignar una oferta (opcional).</p>

  <a href="admin_imagenes.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>

  <div>

    <form class="astein-form" action="admin_edit_inicio_image_process.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
      <label id="image-label"></label><br>
      <div id="employee-image-container">
        <?php
        if($image!='') {
          echo '<img alt="Oferta #'.$id_offer.'" title="Oferta #'.$id_offer.'" class="offer-image-admin" src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
        } else {
          echo 'Image not found.';
        }
        ?>
      </div>
      <label>Imagen</label><input type="file" name="fileToUpload" accept="image/*"><br><br>
      <label>Oferta asociada</label>
      <select name="id_offer" class="form-select" style="display: inline;">
      <?php
      while($rowOffer = $resultOffers->fetch_assoc()) {
        $id_this_offer = $rowOffer['id'];
        echo "<option value='".$rowOffer['id']."'";
        if ($id_this_offer == $id_offer) echo 'selected="selected"';
        echo ">Oferta $id_this_offer: ".$rowOffer['name']."</option>'";
      }
      echo "<option value=''";
      if ($id_offer == '') echo 'selected="selected"';
      echo ">ninguna oferta</option>";
      ?>
      </select>
      <br><br>
      <button type="submit" class="light-icon-button submit-image" style="margin-left: 0px;"><i class="material-icons button-icon">done</i>subir imagen / guardar&nbsp;&nbsp;</button>
      <button type="button" class="light-icon-button delete-image" onclick="askDeleteImage(<?php echo $row["id"]?>);"><i class="material-icons button-icon">delete</i>borrar imagen</button><br><br>
    </form>

</div>

</div>

<script>
function askDeleteImage(inicioImageID) {
    var c = confirm("¿Eliminar este imagen de la página de inicio?");
    if (c == true) {
      window.location.replace("admin_delete_inicio_image.php?id="+inicioImageID);
    } else {
  }
}
</script>

<?php
  include "admin_footer.php";
?>

</body>
</html>
