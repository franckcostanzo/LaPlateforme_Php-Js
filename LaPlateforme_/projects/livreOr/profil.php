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
        Cette page possède un formulaire permettant à l’utilisateur de modifier son
        login et son mot de passe.
    --> 

    <?php include('header.php');?>

    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
        <?php
            if (isset($_SESSION['username']))
            {
                
        ?>
            <form action="profil.php" method="POST">
                <?php 
                if (count($errors) > 0) { ?>
                    <div class="error">
                        <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php  } ?> 
                <div class="form-group">
                    <label for="oldPasswordGrp"> Old password : </label>
                    <input type="text" name="oldPassword" class="form-control" id="oldPasswordGrp">
                </div>
                <div class="form-group">
                    <label for="passwordGrp"> New password : </label>
                    <input type="text" name="new_password_1" class="form-control" id="passwordGrp">
                </div>
                <div class="form-group">
                    <label for="passwordConfirmGrp"> Confirm new password : </label>
                    <input type="text" name="new_password_2" class="form-control" id="passwordconfirmGrp">
                </div>
                <input class="form-group btn btn-secondary mt-2 mx-2 rounded-pill" type="submit" name="pwd_chg" value="Change Password">
            </form>
        <?php  }
            else
            {
        ?>
            <h3>Vous n'êtes pas connecté !</h3>
            <p>
                Pas encore membre ? <a href="inscription.php"  class="form-group btn btn-secondary mt-2 mx-2 rounded-pill" id="registerGrp">Sign up</a>
            </p>
        <?php
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