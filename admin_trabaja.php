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
  <title>Trabaja con nosotros � Administrador</title>
</head>
<body>

  <?php
    include "admin_navbar.php";
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
    <th>Curriculum Vitae</th>
    <th class="table-options">Opciones</th>
  </tr>
  <tr>
    <td>Pepito Lopez</td>
    <td>alguncorreo@gmail.com</td>
    <td>982221331</td>
    <td><a href="http://www.eduso.net/orientacion/documentos/ejemplo_cv.pdf" target="_blank">cv_pepito_lopez.pdf</a></td>
    <td class="table-options"><i class="material-icons icon-action icon-table" onclick="myFunction()">delete</i></td>
  </tr>
  <tr>
    <td>Carolina Pillajo</td>
    <td>carop1998@gmail.com</td>
    <td>983881331</td>
    <td><a href="http://www.eduso.net/orientacion/documentos/ejemplo_cv.pdf" target="_blank">cv_carolina_pillanjo.pdf</a></td>
    <td class="table-options"><i class="material-icons icon-action icon-table" onclick="myFunction()">delete</i></td>
  </tr>
  <tr>
    <td>Luis Miguel Ramírez de la Cruz</td>
    <td>lm.ramirez.dlcruz@gmail.com</td>
    <td>288781331</td>
    <td><a href="http://www.eduso.net/orientacion/documentos/ejemplo_cv.pdf" target="_blank">cv_luis_ramirez.pdf</a></td>
    <td class="table-options"><i class="material-icons icon-action icon-table" onclick="myFunction()">delete</i></td>
  </tr>
</table>
</div>

<script>
function myFunction() {
    confirm("¿Eliminar este solicitante?");
}
</script>

</div>

<?php
  include "admin_footer.php";
?>

</body>
</html>
