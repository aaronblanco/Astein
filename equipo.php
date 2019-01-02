<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/equipo.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Nuestro equipo</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
    include "connection.php";
  ?>

<div id="main-content">

<h1>Nuestro equipo</h1>
<div id="table-container">
<center>
  <table>
    <?php
    $query = "SELECT * from employee";
    $result = $connection->query($query);
      while($row = $result->fetch_assoc()){
      ?>
    <tr>
    <td>
      <figure>
        <img src=<?php echo $row['photo'];?>>
        <figcaption><?php echo $row['name']; echo " "; echo $row['lastname'];?></figcaption>
      </figure>
    </td>
      <td><p><?php echo $row['description']?></p></td>
    </tr>
  <?php } ?>
</table>
</center>
</div>
</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
