<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livre d'or</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!--
        Ce formulaire ne contient qu’un champs permettant de rentrer son
        commentaire et un bouton de validation. Il n’est accessible qu’aux
        utilisateurs connectés. Chaque utilisateur peut poster plusieurs
        commentaires.
    -->

    <header>
        <nav class="navbar bg-dark w-100">
            <!-- Navbar content -->
            <div class="container-fluid">
                <h1 class="text-light">Livre d'or</h1>
                <nav class="text-light d-flex">
                    <a href="index.php" class="btn btn-secondary mx-2 rounded-pill">Home</a>
                    <a href="livreOr.php" class="btn btn-secondary mx-2 rounded-pill">livre d'or</a>
                    <?php
                        if (isset($_SESSION['username']))
                        {

                    ?>
                        <a href="profil.php" class="btn btn-secondary mx-2 rounded-pill">Mon profil</a>
                        <a href="connexion.php" class="btn btn-secondary mx-2 rounded-pill" onclick="<?php unset($_SESSION['username']); ?>">deconnexion</a>
                    <?php
                        }
                        else
                        {
                    ?>                    
                        <a href="inscription.php" class="btn btn-secondary mx-2 rounded-pill">Inscription</a>
                        <a href="connexion.php" class="btn btn-secondary mx-2 rounded-pill">Connexion</a>
                    <?php
                        }
                    ?>
                </nav>
            </div>
        </nav>
    </header>

    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
        <form action="livreOr.php" method="POST">
            <div class="form-group">
                <label for="messageGrp"> Message : </label>
                <textarea name="message" class="form-control" id="messageGrp"></textarea>
            </div>
            <input class="form-group btn btn-secondary mt-2 mx-2 rounded-pill" type="submit" name="submit" value="Envoyer mon message">
        </form>
    </main>

    <footer>
        <nav class="navbar bg-dark w-10 fixed-bottom">
            <!-- Navbar content -->
            <div class="container-fluid d-flex flex-column align-items-center">
                <a href="https://github.com/franckcostanzo/cours-php/tree/main/LaPlateforme_/projects/livreOr">
                    <i class="fab fa-github-square h1 text-secondary"></i>
                </a>                
            </div>
        </nav>
    </footer>
    
</body>
</html>