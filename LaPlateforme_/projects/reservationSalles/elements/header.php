<?php
    session_start();
?>

<header>
    <nav class="navbar bg-danger rounded-pill m-2">
        <!-- Navbar content -->
        <div class="container-fluid">
            <h1 class="text-light"><a href="index.php">Réservation de Salle</a></h1>
            <a href="https://github.com/franckcostanzo/cours-php/tree/main/LaPlateforme_/projects/reservationSalles">
                <i class="fab fa-github-square h1 text-light"></i>
            </a> 
            <nav class="text-dark d-flex" id="undisp">
                <a href="index.php" class="btn btn-light mx-2 rounded-pill">Home</a>
                <a href="planning.php" class="btn btn-light mx-2 rounded-pill">Planning</a>
                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="reservation-form.php" class="btn btn-light mx-2 rounded-pill">faire une reservation</a>
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
                    <li><a href="planning.php">Planning</a></li>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <li><a href="./reservation-form.php">faire une reservation</a></li>
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