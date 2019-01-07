<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Solicitantes - Administrador</title>
</head>
<body>

  <?php
    require 'seguridad.php'; // Acceso solo para el admin
    include "admin_navbar.php";
    require 'connection.php';
    include "user_feedback.php";
  ?>

  <div id="main-content">

    <?php
    include("seguridad.php");
    ?>

  <h1>Trabaja con nosotros</h1>
  <p class="subtitle">Aquí puede ver la lista de solicitantes.</p>

  <?php
    $query = "SELECT * FROM applicant ORDER BY timestamp DESC";
    $result = $connection->query($query);
  ?>

  <table class="large-table">
    <tr>
        <th>Fecha</th>
        <th>Nombre</th>
        <th>Correo Electrónico</th>
        <th>Teléfono</th>
        <th>Mensaje</th>
        <th>Curriculum Vitae</th>
        <th>Opciones</th>
    </tr>

    <?php

    if(!$result || mysqli_num_rows($result) == 0 ){
      echo "<p>Por el momento no hay ningún solicitante.</p>";
      echo "<script>document.getElementById('result-table').style.display = 'none';</script>";
    } else {
        while($row = $result->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo date_format(new DateTime($row['timestamp']), 'd/m/Y H:i'); ?></td>
        <td><?php echo($row['firstname'].' '.$row['lastname']); ?></td>
        <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
        <td><?php echo $row['phone']; ?></td>
        <?php if ($row['message'] != "") {
            echo('<td class="table-message">'.$row['message'].'</td>');
          } else {
          echo ('<td> </td>');
        }
        ?>
        <td><a class="open-link" href="admin_display_cv.php?id=<?php echo $row['id']; ?>">abrir CV</a></td>
        <td class="reservas-list-options">
          <i class="material-icons icon-action icon-table icon-reservas" onclick="askDeleteApplicant(<?php echo $row["id"] ?>)">delete</i>
        </td>
        </tr>
        <?php
        }
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

  <?php include "admin_footer.php"; ?>

</html>
