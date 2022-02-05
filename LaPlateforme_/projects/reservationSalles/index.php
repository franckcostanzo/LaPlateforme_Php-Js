<?php include('./service/controller.php'); include ('./entity/Reservation.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation de Salle</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>  
</head>
<body>    
    
    <?php include('./elements/header.php');?>
      
    <?php
        $today = date("l d M Y");
        $tempDay = new DateTime($today);
        $dayNumber =  $tempDay->format("w");
        $dayPlus = array();
    ?>

    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
        <h2>Bienvenue sur mon site-projet Reservation de salle </h2>
        <p> Il a été créé dans le cadre du cursus web developpeur<br>
        pour la <a href="https://laplateforme.io/"><h3>LaPlateforme_</h3></p>
        <br>
    </main>  

    
</body>
</html>