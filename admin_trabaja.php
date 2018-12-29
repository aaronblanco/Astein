<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Trabaja con nosotros – Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
    include "connection.php";
    include "user_feedback.php"
  ?>

<div id="main-content">

  <h1>Trabaja con nosotros</h1>
  <p class="subtitle">Aquí puede ver la lista de solicitantes.</p>

  <div>
    <table class="astein-table">
    <tr>
      <th>Nombre</th>
      <th>Correo electrónico</th>
      <th>Teléfono</th>
      <th>CV</th>
      <th>Mensaje</th>
      <th class="table-options">Opciones</th>
    </tr>

  <?php
    $query_findApplicants = "SELECT * from applicant";
    $result = $connection->query($query_findApplicants);

    if ($result && ($result->num_rows > 0)) {
      while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$row["firstname"].' '.$row["lastname"].'</td>';
        echo '<td>'.$row["email"].'</td>';
        echo '<td>'.$row["phone"].'</td>';
        echo '<td><a href="'.$row["cv"].'" target="_blank">abrir PDF</a></td>';
        echo '<td class="table-message">'.$row["message"].'</td>';
        echo '<td class="table-options"><i class="material-icons icon-action icon-table" onclick="askDeleteApplicant('.$row["id"].');">delete</i></td>';
        echo '</tr>';
      }
    } else {
        echo "<tr><td>Todavía no hay ningún solicitante.</td><tr>";
    }
  ?>

</table>
</div>

<script>
function askDeleteApplicant(applicantID) {
    var c = confirm("¿Eliminar este solicitante?");
    if (c == true) {
      window.location.replace("admin_delete_applicant.php"+"?id="+applicantID);
    } else {
  }
}
</script>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
