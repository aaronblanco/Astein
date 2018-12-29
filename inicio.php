<!DOCTYPE html>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
  <link rel="stylesheet" href="css\inicio.css">
  <link rel="stylesheet" href="css\EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
</head>
<body>

  <?php
    include "usuario_navbar.php";
  ?>

<div id="main-content">


<h1> Inicio <h\>


  <img class="mySlides" src="images\oferta2.jpg">
  <img class="mySlides" src="images\oferta4.png">
  <img class="mySlides" src="images\love-orange.png">

  <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>

<script>
var slideIndex = 1; /*Establecemos el indice en la primera imagen*/
showDivs(slideIndex);/*Con showDivs mostramos las imagenes*/

function plusDivs(n) { /*cuando el usuario hace click se convierte en plusDivs*/
    showDivs(slideIndex += n);  /*resta uno o suma uno al slideIndex*/
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;/*Si el slideIndex es menor que 1,
    se establece en número de elementos (x.length)*/
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";/*La función showDiv() oculta(display="none")
        todos los elementos con el nombre de clase "mySlides", y muestra
        ( display = "block" ) el elemento con el slideIndex dado*/
    }
    x[slideIndex-1].style.display = "block";
}</script>


<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
          myIndex = 1
        }
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }

</script>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
