<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Editar Empleado – Administrador</title>
</head>
<body>

  <?php
    require 'seguridad.php'; // Acceso para el admin
    include("admin_navbar.php");
    include("user_feedback.php");
    require 'connection.php';

    $employee_id = $_GET['id'];
    $query_findEmployee = "SELECT email, firstname, lastname, description, activity from employee where ID='$employee_id'";
    $result = $connection->query($query_findEmployee);
    if(mysqli_num_rows($result) > 0 ){
      $row = $result->fetch_assoc();
      $email = $row['email'];
      $name = $row['firstname'];
      $lastname = $row['lastname'];
      $description = $row['description'];
      $activity = $row['activity'];
      //echo($email.$name.$lastname.$description.$activity);
    } else {
        printf("Este Empleado no existe. </br> Error: %s\n", $connection->error);
    }
    ?>

<div id="main-content">

  <?php echo '<h1>'.$name.' '.$lastname.'</h1>' ?>
  <p class="subtitle">Aquí puede editar el empleado en detalle.</p>
  <a href="admin_equipo.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>

  <div id="empleado-info-form">
    <form class="astein-form" action="admin_edit_employee_process.php?id=<?php echo $employee_id ?>" method="post">
      <label id="image-label"></label><br>
      <div id="employee-image-container">
        <img class="employee-image" src="admin_display_employee_image.php?id=<?php echo $employee_id ?>">
        <button class="light-icon-button"><i class="material-icons button-icon">cloud_upload</i>cambiar imagen</button>
        <button class="light-icon-button" id="delete-image"><i class="material-icons button-icon">delete</i>borrar imagen</button>
      </div>
      <label>Correo electrónico</label> <input type="text" class="astein-input" name="email" value="<?php echo $email ?>" required><br>
      <label>Nombre</label> <input type="text" class="astein-input" name="name" value="<?php echo $name ?>" required><br>
      <label>Apellido</label> <input type="text" class="astein-input" name="lastname" value="<?php echo $lastname ?>" required><br>
      <label>Actividad</label> <input type="text" class="astein-input" name="activity" value="<?php echo $activity ?>"><br>
      <label>Descripción</label>
      <textarea class="admin-textarea" name="description"><?php echo $description ?></textarea>
      <input class="save-changes save-changes-admin" id="submit-button" type="submit" value="guardar cambios">
    </form>
  </div>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
