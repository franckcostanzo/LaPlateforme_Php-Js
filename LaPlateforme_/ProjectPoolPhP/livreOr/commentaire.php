<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livre d'or</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!--
        Ce formulaire ne contient qu’un champs permettant de rentrer son
        commentaire et un bouton de validation. Il n’est accessible qu’aux
        utilisateurs connectés. Chaque utilisateur peut poster plusieurs
        commentaires.
    -->

    <?php include('header.php');?>

    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
        <?php
            if (isset($_SESSION['username']))
            { echo "<h3>".$_SESSION['username']."</h3>"; }
            else { echo "tu n'est pas connecté !";}
        ?>
        <form action="livreOr.php" method="POST">
            <div class="form-group">
                <label for="messageGrp"> Message : </label>
                <textarea name="message" class="form-control" id="messageGrp"></textarea>
            </div>
            <input class="form-group btn btn-secondary mt-2 mx-2 rounded-pill" type="submit" name="reg_msg" value="Envoyer mon message">
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