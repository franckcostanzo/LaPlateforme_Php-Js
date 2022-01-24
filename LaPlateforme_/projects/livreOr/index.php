<?php include('functions.php') ?>
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
                    <a href="deconnexion.php" class="btn btn-secondary mx-2 rounded-pill">Déconnexion</a>
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
                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary mx-2 rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-caret-down"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>    -->
                </nav>
            </div>
        </nav>
    </header>

    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
        <?php
            if ((isset($_SESSION['username'])) && ($_SESSION['count'] == 0))
            { 
                echo '<script type="text/javascript">window.alert("Your user name is '.$_SESSION['username'].'\r\n'.$_SESSION['success'].'");</script>';
                $_SESSION['count']++;
            }
        ?>
        <h2>Bienvenue sur mon premier site-projet en php !</h2>
        <p> Dans le cadre du cursus web developpeur pour la plateforme, j'ai dû réaliser ce site dont les consignes étaient :</p>
        <br>
        <figure>
            <blockquote>
    <pre>
    Descriptif du projet

    Vous décidez de créer un livre d’or permettant à vos utilisateurs de laisser
    leurs avis sur votre site.

    Pour commencer, créez votre base de données nommée “livreor” à l’aide
    de phpmyadmin. Dans cette bdd, créez une table “utilisateurs” qui contient
    les champs suivants :

        - id, int, clé primaire et Auto Incrément
        - login, varchar de taille 255
        - password, varchar de taille 255
        Créez une table “commentaires” qui contient les champs suivants :
        - id, int, clé primaire et Auto Incrément
        - commentaire, TEXT
        - id_utilisateur, int
        - date, datetime

    Maintenant que la base de données est prête, vous allez avoir besoin de
    créer différentes pages :
        - Une page d’accueil qui présente votre site (index.php)
        - Une page contenant un formulaire d’inscription (inscription.php) :

        Le formulaire doit contenir l’ensemble des champs présents dans la table
        “utilisateurs” (sauf “id”) ainsi qu’une confirmation de mot de passe. Dès
        qu’un utilisateur remplit ce formulaire, les données sont insérées dans la
        base de données et l’utilisateur est redirigé vers la page de connexion.

        - Une page contenant un formulaire de connexion (connexion.php) :

        Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
        formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
        informations, alors l’utilisateur devient connecté et une (ou plusieurs)
        variables de session sont créées.

        - Une page permettant de modifier son profil (profil.php) :

        Cette page possède un formulaire permettant à l’utilisateur de modifier son
        login et son mot de passe.

        - Une page permettant de voir le livre d’or (livre-or.php) :

        Sur cette page on voit l’ensemble des commentaires, organisés du plus
        récent au plus ancien. Chaque commentaire doit être composé d’un texte
        “posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
        l’utilisateur est connecté, sur cette page figure également un lien vers la
        page d’ajout de commentaire.

        - Un formulaire d’ajout de commentaire (commentaire.php) :

        Ce formulaire ne contient qu’un champs permettant de rentrer son
        commentaire et un bouton de validation. Il n’est accessible qu’aux
        utilisateurs connectés. Chaque utilisateur peut poster plusieurs
        commentaires.

    Votre site doit avoir une structure html correcte et un design soigné à l’aide
    de css. Vous avez la liberté de choisir un thème à l’image de votre groupe.
    Vous devez également rendre la structure et le contenu de votre base de
    données dans une fichier nommé “livreor.sql”.
    </pre>
    </blockquote>
    <figcaption> La Plateforme_ <br><cite>Livre d_or.pdf</cite></figcaption>
    <br>
    <br>
        </figure>
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