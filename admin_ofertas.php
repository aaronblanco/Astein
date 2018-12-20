<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Ofertas - Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
    include("connection.php");
  ?>

  <div id="main-content">
  <h1>Ofertas presentadas en la página</h1>
  <div class="astein-form" style="width:200px;">
    <select id="select">
      <option value="0">Todos</option>
      <option value="1">Particulares</option>
      <option value="2">Empresas</option>
    </select>
  <input type="text" id="search" placeholder="Buscar ofertas por nombre">
  <input type="submit" value="Buscar" onclick="setVars();">
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
      <th>Precio</th>
      <th style="width:33%; word-wrap: word-break">Descripción</th>
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
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['description']; ?></td>
      </tr>
      <?php } ?>
  </table>
  </div>


<?php
  include "admin_footer.php";
?>

</body>
</html>
