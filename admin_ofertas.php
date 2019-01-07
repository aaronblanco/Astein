<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Ofertas - Administrador</title>
</head>
<body>

  <?php
    require 'seguridad.php'; // Acceso para el admin
    require 'seguridadEmpleado.php'; // Acceso para los empleados
    include "admin_navbar.php";
    include "user_feedback.php";
    require 'connection.php';
  ?>

  <div id="main-content">
  <h1>Ofertas</h1>
  <p class="subtitle">Aquí puede ver las ofertas presentadas en la página del usuario.</p>
  <div class="astein-form" style="width:200px;">
    <select id="select" class="admin-select-button">
      <option value="0">Todos</option>
      <option value="1">Particulares</option>
      <option value="2">Empresas</option>
    </select>
  <input type="text" id="search" placeholder="Buscar ofertas por nombre">
  <input type="submit" value="Buscar" id="admin-search-offers-button" onclick="setVars();">
</div>
<script>
function setVars(){
  var select = document.getElementById("select");
  var type = select.options[select.selectedIndex].text;
  var search = document.getElementById("search").value;
  window.location.href="admin_ofertas_search.php?type=" + type + "&search=" + search;
}
</script>

  <table id="table_offers">
    <tr>
      <th>Código</th>
      <th>Nombre</th>
      <th>Proveedor</th>
      <th>Tipo</th>
      <th>Precio</th>
      <!-- <th style="width:33%; word-wrap: word-break">Descripción</th> -->
      <th>Opciones</th>
    </tr>
  <?php
    $query = "SELECT * from offer";
    $result = $connection->query($query);

      while($row = $result->fetch_assoc()){
      ?>
      <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['provider']; ?></td>
      <td><?php echo $row['type']; ?></td>
      <td><?php echo $row['price'].'€'.'/'.$row['priceType']; ?></td>
      <!-- <td><?php echo $row['description']; ?></td> -->
      <td class="reservas-list-options">
        <a href="admin_oferta_detalle.php?id=<?php echo $row["id"] ?>"><i class="material-icons icon-action icon-table icon-reservas">edit</i></a><i class="material-icons icon-action icon-table icon-reservas" onclick="askDeleteOffer(<?php echo $row["id"] ?>)">delete</i>
      </td>
      </tr>
      <?php } ?>
  </table>

  <a href="admin_nueva_oferta.php"><i class="material-icons icon-action plus_icon" id="new-offer">add_box</i></a>

  </div>

  <script>
  function askDeleteOffer(offerID) {
      var c = confirm("¿Eliminar esta oferta?");
      if (c == true) {
        window.location.replace("admin_delete_offer.php"+"?id="+offerID);
      } else {
    }
  }
  </script>

<?php
  include "admin_footer.php";
?>

</body>
</html>
