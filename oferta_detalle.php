<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
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
include "connection.php";
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
    <td><?php echo $row['price'];?>€/<?php echo $row['priceType']?></td>
  </tr>
  <tr>
    <td>Datos</td>
    <td><?php echo $row['data']; echo' '; echo $row['dataUnit'];?></td>
  </tr>
  <tr>
    <td>Proveedor</td>
    <td><?php echo $row['provider'];?></td>
  </tr>
  <tr>
    <td>Llamadas</td>
    <td><?php echo $row['calls'];?></td>
  </tr>
  <tr>
    <td>Fibre</td>
    <td><?php echo $row['fibre'];?></td>
  </tr>
  <tr>
    <td>Descripción</td>
    <td><?php echo $row['description'];?></td>
  </tr>
</table>

<button type="button" onclick="location.href='solicitar.php?id=<?php echo $id?>'" class="navtab">Solicitar</button>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
