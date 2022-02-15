<?php
    session_start();
    include('Controller/UserController.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="Elements/CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Elements/CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="d-flex">
        <div id="logo">
            <img src="Elements/Media/lego.png">
        </div>
        
        <nav class="d-flex flex-row align-items-center justify-content-end">
            <a href="index.php" class="mx-2 fw-bold">Home</a>
            <?php if (isset($_SESSION['firstname'])) : ?>
                <a href="profil.php" class="mx-2 fw-bold">Mon profil</a>
                <a href="deconnexion.php" class="ms-2 me-4 fw-bold">Déconnexion</a>
            <?php else : ?>                   
                <a href="inscription.php" class="mx-2 fw-bold">Inscription</a>
                <a href="connexion.php" class="ms-2 me-4 fw-bold">Connexion</a>
            <?php endif ?>
        </nav>
        
        <div class="btn-group dropstart" id="disp">
        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        </button>
            <ul class="dropdown-menu text-center">
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['firstname'])) : ?>
                    <li><a href="./profil.php">Mon profil</a></li>
                    <li><a href="./service/deconnexion.php">Déconnexion</a></li>
                    <?php else : ?>                  
                    <li><a href="./inscription.php">Inscription</a></li>
                    <li><a href="./connexion.php">Connexion</a></li>
                <?php endif ?>                
            </ul>
        </div>
    </header>
    