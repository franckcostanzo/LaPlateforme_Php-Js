<?php include('./service/controller.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation choisie</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>  
</head>
<body>    
    
    <?php include('./elements/header.php');?>
        

    <main class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-12 border border-dark m-5 p-5" id="resaForm">
                <h2> Titre : <?= $_GET['titre']?></h2>
                <br>
                <p>Réservation faites par : <b><?=$_GET['username']?></b></p>
                <label for="description">Description :</label>
                <div class="border border-dark p-2" id="description" rows="5" cols="30"><?= $_GET['description']?></div>
                <br>
                <p>Debut : <?= $_GET['debut']?></p>
                <p>Fin : <?= $_GET['fin']?></p>
                </textarea>
            </div>
        </div>
    </main>  

    
</body>
</html>