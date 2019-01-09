<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Oferta Detalle – Administrador</title>
</head>
<body>

  <?php
    require 'seguridadEmpleado.php'; // Acceso para admin y empleados
    require 'connection.php';
    include "admin_navbar.php";
    include "user_feedback.php";

    $id = $_GET['id'];

    $query_findOffer = "SELECT * FROM offer WHERE id = $id";
    $result = $connection->query($query_findOffer);

    if(mysqli_num_rows($result) > 0 ){
      $row = $result->fetch_assoc();
      $image = $row["image"];
    } else {
        echo "<script>window.onload = function(e) {document.getElementById('main-content').remove();};</script>";
        echo "<h1>&nbsp;&nbsp;Esta Oferta no existe. </br>".$connection->error."</h1></div>";
    }
  ?>

<div id="main-content">

  <h1><?php echo $row['name']?></h1>
  <p class="subtitle">Aquí puede editar la oferta.</p>
  <a href="admin_ofertas.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>

  <div id="oferta-info-form">

    <form class="astein-form" action="admin_edit_offer_image.php?id=<?php echo $row["id"] ?>" method="post" enctype="multipart/form-data">
      <label id="image-label"></label><br>
      <div id="employee-image-container">
        <?php
        if($image!='') {
          echo '<img class="offer-image-admin" src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
        } else {
          echo '<div class="offer-no-image-admin">
            <p class="offer-headline">'.$row['name'].'<p>
            <p class="offer-price">'.$row['price'].'€'.'/'.$row['priceType'].'<p>
          </div>';
        }
        ?>
      </div>
      <label>Imagen</label><input type="file" name="fileToUpload" accept="image/*"><br><br>
      <button type="submit" class="light-icon-button submit-image"><i class="material-icons button-icon">done</i>subir imagen</button>
      <button type="button" class="light-icon-button delete-image" onclick="askDeleteImage(<?php echo $row["id"]?>);"><i class="material-icons button-icon">delete</i>borrar imagen</button><br><br>
    </form>
    <br><br>

    <form class="astein-form" action="admin_edit_offer_process.php" method="post">
      <label>Nombre</label> <input type="text" class="astein-input" name="name" value="<?php echo $row["name"]?>"required><br>
      <label>Proveedor</label> <input type="text" class="astein-input" name="provider" value="<?php echo $row["provider"]?>" required><br>
      <label>Tipo</label>
      <select name="type" class="form-select" style="display: inline;">
        <option value="particulares">particulares</option>
        <option value="empresas">empresas</option>
      </select><br>
      <label>Precio</label>
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" step="0.01" name="price" value="<?php echo $row["price"]?>" required>
        <select name="priceType" class="form-select" style="display: inline;">
          <option value="mes" <?php if ($row["priceType"] == 'mes') echo 'selected="selected"'; ?>>/ mes</option>
          <option value="año" <?php if ($row["priceType"] == 'año') echo 'selected="selected"'; ?>>/ año</option>
        </select><br>
      </div>
      <label>Datos</label>
      <input type="checkbox" id="data_included" name="data_included" value="data_included" <?php if (!($row["data"] == '0')) echo "checked='checked'"; ?> onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="data" name="data" value="<?php if($row["data"]!='99999' and $row["data"]!='0') echo $row["data"]?>" onfocus="manageTextbox(this)">
        <select name="dataUnit" class="form-select" style="display: inline;">
          <option value="GB" <?php if ($row["dataUnit"] == 'GB') echo 'selected="selected"'; ?>>GB</option>
          <option value="MB" <?php if ($row["dataUnit"] == 'MB') echo 'selected="selected"'; ?>>MB</option>
        </select>
        <input type="checkbox" class="inline-checkbox" id="data_unlimited" name="data_unlimited" value="data_unlimited" <?php if($row["data"]=='99999') echo "checked='checked'";?> onchange="manageCheckboxUnlimited(this)">ilimitados<br>
      </div>
      <label>Llamadas</label>
      <input type="checkbox" id="calls_included" name="calls_included" value="calls_included" <?php if (!($row["calls"] == '0')) echo "checked='checked'"; ?> onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="calls" name="calls" value="<?php if($row["calls"]!='99999' and $row["calls"]!='0') echo $row["calls"]?>" onfocus="manageTextbox(this)">minutos
        <input type="checkbox" class="inline-checkbox" id="calls_unlimited" name="calls_unlimited" value="calls_unlimited" <?php if($row["calls"]=='99999') echo "checked='checked'";?> onchange="manageCheckboxUnlimited(this)">ilimitadas<br>
      </div><br><br>
      <label>Fibra</label>
      <input type="checkbox" id="fiber_included" name="fiber_included" value="fiber_included" <?php if (!($row["fiber"] == '0')) echo "checked='checked'"; ?> onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="fiber" name="fiber" value="<?php if($row["fiber"]!='0') echo $row["fiber"]?>" onfocus="manageTextbox(this)">
        <label class="legend-label">Mb</label>
      </div><br><br><br>
      <label>Descripción</label>
      <textarea class="admin-textarea" id="description" name="description"><?php echo $row["description"]?></textarea>
      <input class="save-changes new-employee-admin" type="submit" method="post" value="Guardar cambios">
    </form>

  </div>

  <script>
    function manageCheckbox(checkbox) {
    if (checkbox.checked) {
      console.log("Checkbox checked.");
    } else {
      if (checkbox.id == "data_included") {
        document.getElementById("data").value = "";
        document.getElementById("data_unlimited").checked = false;
      }
      if (checkbox.id == "calls_included") {
        document.getElementById("calls").value = "";
        document.getElementById("calls_unlimited").checked = false;
      }
      if (checkbox.id == "fiber_included") {
        document.getElementById("fiber").value = "";
      }
      }
    }
    function manageCheckboxUnlimited(checkbox) {
    if (checkbox.checked) {
      if (checkbox.id == "data_unlimited") {
        document.getElementById("data").value = "";
        document.getElementById("data_included").checked = true;
      }
      if (checkbox.id == "calls_unlimited") {
        document.getElementById("calls").value = "";
        document.getElementById("calls_included").checked = true;
      }
      }
    }
    function manageTextbox(box) {
    if (box.id == "data") {
      console.log("textbox data");
        document.getElementById("data_included").checked = true;
      }
      if (box.id == "calls") {
        console.log("textbox calls");
        document.getElementById("calls_included").checked = true;
      }
      if (box.id == "fiber") {
        console.log("textbox fiber");
        document.getElementById("fiber_included").checked = true;
      }
    }
  </script>

</div>

<script>
function askDeleteImage(employeeID) {
    var c = confirm("¿Eliminar este imagen?");
    if (c == true) {
      console.log("Deleting image from employee"+employeeID);
      window.location.replace("admin_delete_offer_image.php?id="+employeeID);
    } else {
  }
}
</script>

<?php
  include "admin_footer.php";
?>

</body>
</html>
