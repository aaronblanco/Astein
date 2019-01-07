<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/equipo.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <title>Nuestro equipo</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
    require 'connection.php';
  ?>

<div id="main-content">

<h1>Nuestro equipo</h1>
<div id="table-container">
  <table id="employee-table">
    <?php
    $query = "SELECT * from employee";
    $result = $connection->query($query);
      while($row = $result->fetch_assoc()){
      ?>
    <tr>
    <td>
      <figure>
        <img src=<?php echo $row['photo'];?>>
      </figure>
    </td>
      <td><div class="employee-list-name"><?php echo $row['username']; echo " "; echo $row['lastname'];?></div><?php echo $row['activity'];?><br><br><?php echo $row['description']?></td>
    </tr>
  <?php } ?>
</table>
</div>
</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
