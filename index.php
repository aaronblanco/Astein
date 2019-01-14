<!DOCTYPE html>
<html>
<head>
  <?php require 'meta_tags.php'; ?>
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <title>Inicio – Astein</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
    include "user_feedback.php";
    require 'connection.php';
  ?>

  <div class="inicio-container">
      <h1>Tus mejores ofertas en telefonía</h1>
    <?php
      $query = "SELECT * from photoinicio";
      $result = $connection->query($query);

        while($row = $result->fetch_assoc()){
          $image = $row["image"];
          $id_offer = $row["id_offer"];
          if ($id_offer == '') {
            echo "<img alt='imagen de inicio' class='slides slides-static' src='data:image/jpeg;base64,".base64_encode($image)."'/>";
          } else {
            echo "<a alt='imagen de oferta' href='oferta_detalle.php?id=$id_offer'><img class='slides' src='data:image/jpeg;base64,".base64_encode($image)."'/></a>";
          }
        }
    ?>

    </div>

    <br>

    <div class="arrows-container">
      <i class="material-icons icon-inicio" onclick="plusDivs(-1);">keyboard_arrow_left</i>
      <i class="material-icons icon-inicio" onclick="plusDivs(1);">keyboard_arrow_right</i>
    </div>

<script>
var slideIndex = 1; /*Establecemos el indice en la primera imagen*/
showDivs(slideIndex);/*Con showDivs mostramos las imagenes*/

function plusDivs(n) { /*cuando el usuario hace click se convierte en plusDivs*/
    showDivs(slideIndex += n);  /*resta uno o suma uno al slideIndex*/
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("slides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;/*Si el slideIndex es menor que 1,
    se establece en número de elementos (x.length)*/
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";/*La función showDiv() oculta(display="none")
        todos los elementos con el nombre de clase "slides", y muestra
        ( display = "block" ) el elemento con el slideIndex dado*/
    }
    x[slideIndex-1].style.display = "block";
}</script>


<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("slides");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
          myIndex = 1
        }
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 3000); // Change image every 3 seconds
        // setTimeout(carousel, 100000); // Change image every 100 seconds
    }

</script>

<?php
  include "usuario_footer.php";
?>

</body>
</html>
