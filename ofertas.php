<!DOCTYPE html>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>

  <link rel="stylesheet" href="css\ofertas.css">
    <link rel="stylesheet" href="css\EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

  <?php
    include "admin_navbar.php";
    include("connection.php");
  ?>

  <div id="main-content">
  <h1>Ofertas</h1>
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
  window.location.href="client_ofertas_search.php?type=" + type + "&search=" + search;
}
</script>


  <?php
    $query = "SELECT * from offer";
    $result = $connection->query($query);

      while($row = $result->fetch_assoc()){
      ?>
        <div class="offer">
            <a href="oferta_detalle.php?id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a>
            <p><?php echo $row['price']; ?></p>
        </div>
      <?php } ?>

      </script>
  </div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
