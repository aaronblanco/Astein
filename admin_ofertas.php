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
  ?>

  <div id="main-content">
  <h1>Ofertas presentadas en la pagina</h1>
  <div class="selection" style="width:200px;">
    <select>
      <option value="0">Particulares</option>
      <option value="1">Empresas</option>
    </select>
  </div>
  <div class="search">
  <form action="\Astein\ofertasadmin.html" method="POST">
  <input type="text" placeholder="Buscar ofertas" required="true">
  <input type="submit" value="Buscar">
  </form>
  </div>
  <table>
    <tr>
      <th>Código</th>
      <th>Nombre</th>
      <th>Proveedor</th>
      <th>Precio</th>
      <th style="width:33%; word-wrap: word-break">Descripción</th>
      </tr>
  <?php
    include("connection.php");
    $query = "SELECT * from offer";
    $result = $connection->query($query);
      while($row = $result->fetch_assoc()){
      ?>
      <tr>
      <td><?php echo $row['ID']; ?></td>
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
