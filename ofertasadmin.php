<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="astein.css">
  <link rel="stylesheet" href="ofertasadmin.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Ofertas - Administrador</title>
</head>
<body>

  <ul class="navbar">
  <li><img id="astein-logo" src="images/astein_white.png"></li>
  <li> <button type="button" onclick="location.href='inicio.html'" class="navtab">Login</button></li>
  <li> <button type="button" onclick="location.href='index.html'" class="navtab">Inicio</button></li>
  <li> <button type="button" onclick="location.href='contacta.html'" class="navtab">Contacta con nosotros</button></li>
  <li> <button type="button" onclick="location.href='equipo.html'" class="navtab">Equipo</button></li>
  <li> <button type="button" onclick="location.href='ofertas.html'" class="navtab">Ofertas</button></li>
  <li> <button type="button" onclick="location.href='trabajar.html'" class="navtab">Trabaja con nosotros</button></li>
  </ul>
<div id="main-content">
<h1>Ofertas presentadas en la pagina</h1>
<div class="selection" style="width:200px;">
  <select>
    <option value="0">Particulares</option>
    <option value="1">Empresas</option>
  </select>
</div>
<div class="search">
<form action="\Astein\ofertasadmin.html" method="POST">
<input type="text" placeholder="Buscar ofertas" required="true">
<input type="submit" value="Buscar">
</form>
</div>
<table>
  <tr>
    <th>Código</th>
    <th>Nombre</th>
    <th>Proveedor</th>
    <th>Precio</th>
    <th style="width:33%; word-wrap: word-break">Descripción</th>
    </tr>
<?php
  include(connection.php);
  $query = "SELECT * from offer";
  $result = $connection->query($query);
    while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['ID']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['provider']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['description']; ?></td>
    </tr>
    <?php } ?>
</table>
</div>
<div id="footer">
<img class="social-media-icon" src="images/facebook_icon.png" href="facebook.com">
<img class="social-media-icon" src="images/instagram_icon.png" href="instagram.com">
</div>
<div id="footer-right">
<i class="material-icons icon-white" id="footer-icon">location_on</i>
<p class="footer-text"> Carretera de Almeria 86 Oficina 5, Huercal De Almeria </p>
<i class="material-icons icon-white" id="footer-icon">phone</i>
<p class="footer-text"> +34 601 221 125 </p>
</div>
</body>
</html>
