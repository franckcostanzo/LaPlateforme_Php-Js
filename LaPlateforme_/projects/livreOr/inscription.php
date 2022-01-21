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
        Le formulaire doit contenir l’ensemble des champs présents dans la table
        “utilisateurs” (sauf “id”) ainsi qu’une confirmation de mot de passe. Dès
        qu’un utilisateur remplit ce formulaire, les données sont insérées dans la
        base de données et l’utilisateur est redirigé vers la page de connexion.
    -->

    <header>
        <nav class="navbar bg-dark">
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

    <main class="my-3 mx-5 px-5 d-flex flex-column justify-content-center align-items-center">
        <form action="connexion.php" method="POST">
            <div class="form-group">
                <label for="loginGrp"> Login : </label>
                <input type="text" name="login" class="form-control" id="loginGrp">
            </div>
            <div class="form-group">
                <label for="passwordGrp"> Password : </label>
                <input type="text" name="password" class="form-control" id="passwordGrp">
            </div>
            <div class="form-group">
                <label for="passwordConfirmGrp"> Confirm Password : </label>
                <input type="text" name="passwordConfirm" class="form-control" id="passwordConfirmGrp">
            </div>
            <input class="form-group btn btn-secondary mt-2 mx-2 rounded-pill" type="submit" name="submit" value="Register">
        </form>
    </main>

    
    <?php
        // if (isset($_POST))
        // {
        //     $username = $_POST['login'];
        //     $password = $_POST['password'];
        //     $passwordConfirm = $_POST['username'];
        //     $data = $_POST;
        // }                
        // if (empty($data['username']) ||
        //     empty($data['password']) ||
        //     empty($data['email']) ||
        //     empty($data['password_confirm'])) 
        // {            
        //     die('Please fill all required fields!');
        // }
        // if ($data['password'] !== $data['password_confirm']) {
        //     die('Password and Confirm password should match!');   
        // }
    ?>

</body>
</html>