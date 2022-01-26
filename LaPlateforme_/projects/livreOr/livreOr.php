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
        Sur cette page on voit l’ensemble des commentaires, organisés du plus
        récent au plus ancien. Chaque commentaire doit être composé d’un texte
        “posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
        l’utilisateur est connecté, sur cette page figure également un lien vers la
        page d’ajout de commentaire.
    -->

    <?php include('header.php');?>

    <main class="my-3 d-flex flex-column align-items-center">
        <!-- un bouton pour rajouter un commentaire qui pointe vers commentaire.php -->
        <?php
            if (isset($_SESSION['username']))
            {
        ?>
        <a href="commentaire.php" class="btn btn-secondary mx-2 rounded-pill" role="button">Laisser un commentaire</a>
             
        <?php
            }
            $msgQuery = "SELECT commentaire, date, username FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY 'date';";
            $messages = mysqli_query($db,$msgQuery);
            foreach ($messages as $message)  
            {
                $date = strtotime($message['date']);
                $formatForView = date("d/m/y", $date);
                echo "
                <figure class='m-3 p-3 border border-secondary'>
                    <blockquote>"
                        .$message['commentaire'].
                    "</blockquote>
                    <figcaption>"
                        .$message['username']."<br>
                        <cite> Posté le ".$formatForView."</cite>
                    </figcaption>
                    <br>
                    <br>
                </figure>
                ";
            }   
        ?>
                
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