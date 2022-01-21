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
        Sur cette page on voit l’ensemble des commentaires, organisés du plus
        récent au plus ancien. Chaque commentaire doit être composé d’un texte
        “posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
        l’utilisateur est connecté, sur cette page figure également un lien vers la
        page d’ajout de commentaire.
    -->

    <header>
        <nav class="navbar bg-dark ">
            <!-- Navbar content -->
            <div class="container-fluid">
                <h1 class="text-light">Livre d'or</h1>
                <nav class="text-light d-flex">
                    <a href="index.php" class="btn btn-secondary mx-2 rounded-pill">Home</a>
                    <a href="livreOr.php" class="btn btn-secondary mx-2 rounded-pill">livre d'or</a>
                    <a href="profil.php" class="btn btn-secondary mx-2 rounded-pill">Mon profil</a>
                    <a href="inscription.php" class="btn btn-secondary mx-2 rounded-pill">Inscription</a>
                    <a href="connexion.php" class="btn btn-secondary mx-2 rounded-pill">Connexion</a>
                </nav>
            </div>
        </nav>
    </header>

    <main class="my-3 d-flex flex-column justify-content-center align-items-center">
        <!-- un bouton pour rajouter un commentaire qui pointe vers commentaire.php -->
        <a href="commentaire.php" class="btn btn-secondary mx-2 rounded-pill" role="button">Leave a comment</a>

        
    </main>



    
</body>
</html>