<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Nueva Oferta – Administrador</title>
</head>
<body>

  <?php
    require 'seguridadEmpleado.php'; // Acceso para admin y empleados
    include "admin_navbar.php";
    include "user_feedback.php";
  ?>

<div id="main-content">

  <h1>Nueva Oferta</h1>
  <p class="subtitle">
    Aquí puede crear una nueva oferta.
    Después de haber creado la oferta, puede pulsar en "editar" para añadir un imágen.
  </p>
  <a href="admin_ofertas.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>

  <div id="oferta-info-form">
    <form class="astein-form" action="admin_new_offer_process.php" method="post">
      <label>Nombre</label> <input type="text" class="astein-input" name="name" required><br>
      <label>Proveedor</label> <input type="text" class="astein-input" name="provider" required><br>
      <label>Tipo</label>
      <select name="type" class="form-select" style="display: inline;">
        <option value="particulares">particulares</option>
        <option value="empresas">empresas</option>
      </select><br>
      <label>Precio</label>
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" step="0.01" name="price" required>
        <select name="priceType" class="form-select" style="display: inline;">
          <option value="mes">/ mes</option>
          <option value="año">/ año</option>
        </select><br>
      </div>
      <label>Datos</label>
      <input type="checkbox" id="data_included" name="data_included" value="data_included" onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="data" name="data" onfocus="manageTextbox(this)">
        <select name="dataUnit" class="form-select" style="display: inline;">
          <option value="GB">GB</option>
          <option value="MB">MB</option>
        </select>
        <input type="checkbox" class="inline-checkbox" id="data_unlimited" name="data_unlimited" value="data_unlimited" onchange="manageCheckboxUnlimited(this)">ilimitados<br>
      </div>
      <label>Llamadas</label>
      <input type="checkbox" id="calls_included" name="calls_included" value="calls_included" onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="calls" name="calls" onfocus="manageTextbox(this)">minutos
        <input type="checkbox" class="inline-checkbox" id="calls_unlimited" name="calls_unlimited" value="calls_unlimited" onchange="manageCheckboxUnlimited(this)">ilimitadas<br>
      </div><br><br>
      <label>Fibra</label>
      <input type="checkbox" id="fiber_included" name="fiber_included" value="fiber_included" onchange="manageCheckbox(this)">
      <div>
        <input type="number" class="astein-input inline-textfield" min="0" id="fiber" name="fiber" onfocus="manageTextbox(this)">
        <label class="legend-label">Mb</label>
      </div><br><br><br>
      <label>Descripción</label>
      <textarea class="admin-textarea" id="description" name="description"></textarea>
      <input class="save-changes new-employee-admin" type="submit" method="post" value="Crear oferta">
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

<?php
  include "admin_footer.php";
?>

</body>
</html>
