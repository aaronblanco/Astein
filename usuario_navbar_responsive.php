<div class="topnav" id="myTopnav">
  <a href="inicio.php" class="ignore"><div id="logo-tab"><img id="astein-logo-responsive" src="images/astein_white.png"></div></a>
  <a href="inicio.php" class="active">Inicio</a>
  <a href="contacto.php">Contacta con nosotros</a>
  <a href="ofertas.php">Ofertas</a>
  <a href="equipo.php">Equipo</a>
  <a href="equipo.php">Trabaja con nosotros</a>
  <a href="javascript:void(0);" class="hamburger-icon ignore" onclick="myFunction()">
    <div id="hamburger-tab">
      <i class="material-icons" id="navbar-hamburger">menu</i>
    </div>
  </a>
</div>

<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
