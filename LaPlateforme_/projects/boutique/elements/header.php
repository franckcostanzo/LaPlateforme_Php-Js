<?php
    session_start();
    include('Controller/controller.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <nav class="navbar bg-info rounded-pill m-2">
        <!-- Navbar content -->
        <div class="container-fluid">
            <h1 class="text-light"><a href="index.php">Memory</a></h1>
            <a href="https://github.com/franckcostanzo/cours-php/tree/main/LaPlateforme_/projects/memory">
                <i class="fab fa-github-square h1 text-light"></i>
            </a> 
            <nav class="text-dark d-flex" id="undisp">
                <a href="index.php" class="btn btn-light mx-2 rounded-pill">Home</a>
                <?php if (isset($_SESSION['firstname'])) : ?>
                    <a href="profil.php" class="btn btn-light mx-2 rounded-pill">Mon profil</a>
                    <a href="deconnexion.php" class="btn btn-light mx-2 rounded-pill">Déconnexion</a>
                <?php else : ?>                   
                    <a href="inscription.php" class="btn btn-light mx-2 rounded-pill">Inscription</a>
                    <a href="connexion.php" class="btn btn-light mx-2 rounded-pill">Connexion</a>
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
        </div>
    </nav>
</header>