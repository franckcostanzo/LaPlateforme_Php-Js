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

    <?php include('header.php');?>

    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
        <?php
            if ((isset($_SESSION['username'])) && ($_SESSION['count'] == 0))
            { 
                echo '<script type="text/javascript">window.alert("Your user name is '.$_SESSION['username'].'\r\n'.$_SESSION['success'].'");</script>';
                $_SESSION['count']++;
            }
        ?>
        <h2>Bienvenue sur mon premier site-projet en php !</h2>
        <p> Il a été créé dans le cadre du cursus web developpeur<br>
        pour la <a href="https://laplateforme.io/"><h3>LaPlateforme_</h3></p>
        <br>
        
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