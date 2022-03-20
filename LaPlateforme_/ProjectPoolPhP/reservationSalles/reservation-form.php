<?php include('./service/controller.php'); ?>

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
        

    <main class="container-fluid">
        <div class="row d-flex justify-content-center">            

            <div class="col-md-12 border border-dark rounded-3" id="resaForm">

                <?php if (count($errors) > 0) : ?>
                    <div class="error">
                        <?php foreach ($errors as $error) : ?>
                        <p><?php echo "<h6 style='color:red;'>".$error."</h6>" ?></p>
                        <?php endforeach ?>
                    </div>
                <?php  endif; ?>

                <h2 class="mt-2">Formulaire de réservation</h2>

                <p>Utilisateur : <?= $_SESSION['username'] ?></p>
                <form action="reservation-form.php" method="POST">

                    <div class="form-group">
                        <label for="titreGrp"> Titre : </label>
                        <input type="text" name="titre" class="form-control" id="titreGrp">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="selectGrp"> Heure de début : </label>
                        <br>
                        <!-- altérer le formulaire pour afficher le $_GET['debut'] -->
                        <select name="heureDebut" id="selectGrp">
                            <option value="">--Votre choix--</option>
                            <?php for($i=0;$i<11;$i++) : ?>
                                <option value="<?= 8+$i?>"><?= 8+$i?>h</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="selectGrp2"> Heure de fin : </label>
                        <br>
                        <select name="heureFin" id="selectGrp2">
                            <option value="">--Votre choix--</option>
                            <?php for($i=1;$i<12;$i++) : ?>
                                <option value="<?= 8+$i?>"><?= 8+$i?>h</option>
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

                    <input class="form-group btn btn-danger my-2 mx-2 rounded-pill" 
                    type="submit" name="resaForm" value="Soumettre ma réservation">
                </form>

            </div>
        </div>
    </main>    

    
</body>
</html>