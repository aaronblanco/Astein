<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Equipo  Administrador</title>
</head>
<body>

  <?php
include("seguridad.php");
    include("user_feedback.php");
    include "admin_navbar.php";
    include("connection.php");
  ?>

<div id="main-content">

  <h1>Equipo</h1>
  <p class="subtitle">Aquí puede cambiar las informaciones sobre sus empleados.</p>

<div id="admin-inicio-image-list">

<form class="astein-form" action="/action_page.php" method="post">

<?php

  $query_findEmployees = "SELECT * from employee";
  $result = $connection->query($query_findEmployees);

  if ($result && ($result->num_rows > 0)) {
    while($row = $result->fetch_assoc()) {
      echo '<div class="admin-inicio-image admin-equipo">';
      echo '<p class="inicio-imagename employee-name">'.$row["name"]." ".$row["lastname"].'</p>';
      echo '<a href="admin_empleado.php?id='.$row["id"].'"><i class="material-icons icon-action">edit</i></a>';
      echo '<i class="material-icons icon-action" onclick="askDeleteEmployee('.$row["id"].');">delete</i>';
      echo '<i class="material-icons icon-arrow">keyboard_arrow_up</i>';
      echo '<i class="material-icons icon-arrow">keyboard_arrow_down</i>';
      echo '</div>';
    }
  } else {
      echo "<p> Todavía no hay ningún empleado. </p>";
  }

?>

<div>
<a href="admin_nuevo_empleado.php"><i class="material-icons icon-action plus_icon" id="new-employee">add_box</i></a>
</div>

</form>

</div>

</div>

<script>
function askDeleteEmployee(employeeID) {
    var c = confirm("¿Eliminar este empleado?");
    if (c == true) {
      window.location.replace("admin_delete_employee.php"+"?id="+employeeID);
    } else {
  }
}
</script>

<?php
  include "admin_footer.php";
?>

</body>

</html>
