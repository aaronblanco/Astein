<div class="topnav" id="myAdminTopnav">
  <a href="admin_inicio.php" class="ignore"><div id="logoTab" class="logo-tab-collapsed"><img id="astein-logo-responsive" src="images/astein_white.png"></div></a>
  <a href="admin_login.php">Login</a>
  <a href="admin_inicio.php">Inicio</a>
  <a href="admin_contacta.php">Contacto</a>
  <a href="admin_equipo.php">Equipo</a>
  <a href="admin_contrasena.php">Contraseña</a>
  <a href="admin_ofertas.php">Ofertas</a>
  <a href="admin_reservas.php">Reservas</a>
  <a href="admin_solicitantes.php">Trabajo</a>
  <a href="javascript:void(0);" class="hamburger-icon ignore" onclick="myFunction()">
    <div id="hamburger-tab">
      <i class="material-icons" id="navbar-hamburger">menu</i>
    </div>
  </a>
</div>

<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myAdminTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
    document.getElementById("logoTab").className = "logo-tab-expanded";
    document.getElementById("navbar-hamburger").innerHTML = "close";
  } else {
    x.className = "topnav";
    document.getElementById("logoTab").className = "logo-tab-collapsed";
    document.getElementById("navbar-hamburger").innerHTML = "menu";
  }
}
</script>
