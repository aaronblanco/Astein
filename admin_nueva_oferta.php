<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Nueva Oferta – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
    include "user_feedback.php";
  ?>

<div id="main-content">

  <h1>Nueva Oferta</h1>
  <p class="subtitle">Aquí puede crear una nueva oferta.</p>
  <a href="admin_ofertas.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>

  <div id="oferta-info-form">
    <form class="astein-form" action="admin_new_offer_process.php" method="post">
      <label>Nombre</label> <input type="text" class="astein-input" name="name" required><br>
      <label>Proveedor</label> <input type="text" class="astein-input" name="provider" required><br>
      <label>Tipo</label>
      <select name="type" class="form-select" style="display: inline;">
        <option value="in progress">particulares</option>
        <option value="new">empresas</option>
      </select><br>
      <label>Precio</label>
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" step="0.01" name="price">
        <select name="priceType" class="form-select" style="display: inline;">
          <option value="in progress">/ mes</option>
          <option value="new">/ año</option>
        </select><br>
      </div>
      <label>Datos</label>
      <input type="checkbox" name="data_included" id="data_included" value="data_included" onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="data" name="data" onfocus="manageTextbox(this)">
        <select name="dataUnit" class="form-select" style="display: inline;">
          <option value="in progress">GB</option>
          <option value="new">MB</option>
        </select><br>
      </div>
      <label>Llamadas</label>
      <input type="checkbox" name="calls_included" id="calls_included" value="calls_included" onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="calls" name="calls" onfocus="manageTextbox(this)">
      </div><br><br><br>
      <label>Fibra</label>
      <input type="checkbox" name="fiber_included" id="fiber_included" value="fiber_included" onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="fiber" name="fiber" onfocus="manageTextbox(this)">
        <label class="legend-label">Mb</label>
      </div><br><br><br>
      <label>Imagen</label><input type="file" class"file-upload" name="imagen"><br><br><br>
      <label>Descripción</label>
      <textarea class="admin-textarea" name="description"></textarea>
      <input class="save-changes new-employee-admin" type="submit" action="saved_changes.php" method="post" value="crear oferta">
    </form>
  </div>

  <script>
    function manageCheckbox(checkbox) {
    if (checkbox.checked) {
      console.log("Checkbox checked.");
    } else {
      if (checkbox.id == "data_included") {
        document.getElementById("data").value = "";
      }
      if (checkbox.id == "calls_included") {
        document.getElementById("calls").value = "";
      }
      if (checkbox.id == "fiber_included") {
        document.getElementById("fiber").value = "";
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

<?php
  include "admin_footer.php";
?>

</body>
</html>
