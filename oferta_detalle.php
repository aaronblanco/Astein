<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/oferta.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Detalles</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
  ?>

<div id="main-content">

<h1>Detalles de la oferta selectada</h1>
<?php
require 'connection.php';
$id = $_GET['id'];

$query_getDetails = $connection->prepare("SELECT * from offer where id = ?");
$query_getDetails->bind_param("i", $id);
$query_getDetails->execute();
$result = $query_getDetails->get_result();
$row = $result->fetch_assoc()
?>
<h2><?php echo $row['name'];?></h2>
<table>
  <tr>
    <td>Precio</td>
    <td><?php echo $row['price']; echo '€/'; echo $row['priceType']?></td>
  </tr>
  <tr>
    <td>Datos</td>
    <td><?php if(empty($row['data'])){echo "/";} echo $row['data']; echo " "; echo $row['dataUnit'];?></td>
  </tr>
  <tr>
    <td>Proveedor</td>
    <td><?php echo $row['provider'];?></td>
  </tr>
  <tr>
    <td>Llamadas</td>
    <td><?php if (!empty($row['calls'])){echo $row['calls']; echo ' Minutos';}else{echo "/";}?></td>
  </tr>
  <tr>
    <td>Fibra</td>
    <td><?php if (!empty($row['fiber'])){echo $row['fiber']; echo ' GB';}else{echo "/";}?></td>
  </tr>
  <tr>
    <td>Descripción</td>
    <td style="width:70%; word-wrap: word-break"><?php if (!empty($row['description'])){echo $row['description'];}else{echo "Lo sentimos, no hay descripción. Si tienes alguna duda, pregúntanos!";}?></td>
  </tr>
</table>
<div class="offer_photo_container">
  <img src="<?php echo $row['photo']?>">
</div>

<button type="button" class="submit_button" onclick="location.href='solicitar.php?id=<?php echo $id?>'" class="navtab">Solicitar</button>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
