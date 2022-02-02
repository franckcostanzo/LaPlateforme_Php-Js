<?php include('./service/controller.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>  
</head>
<body>    
    
    <?php include('./elements/header.php');?>
        

    <main class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 border border-dark rounded-3" id="resaForm">

                <h2 class="mt-2">Formulaire de réservation</h2>

                <p>Utilisateur : <?= $_SESSION['username']?></p>
                <form action="" method="POST">

                    <div class="form-group">
                        <label for="titreGrp"> Titre : </label>
                        <input type="text" name="titre" class="form-control" id="titreGrp">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="selectGrp"> Heure de la réservation : </label>
                        <br>
                        <select name="pets" id="selectGrp">
                            <option value="">--choisissez votre créneau--</option>
                            <?php for($i=0;$i<11;$i++) : ?>
                                <option value="<?= 8+$i?>h"><?= 8+$i?>h</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="dateGrp"> Date : </label>
                        <input type="date" name="date" class="form-control" id="dateGrp"></textarea>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="messageGrp"> Description : </label>
                        <textarea name="description" class="form-control" id="messageGrp"></textarea>
                    </div>
                    <br>

                    <input class="form-group btn btn-danger my-2 mx-2 rounded-pill" type="submit" type="submit" value="Soumettre ma réservation">
                </form>

            </div>
        </div>
    </main>    

    
</body>
</html>