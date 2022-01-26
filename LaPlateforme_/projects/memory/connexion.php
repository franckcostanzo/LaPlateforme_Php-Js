<?php include('./service/functions.php') ?>
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
        Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
        formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
        informations, alors l’utilisateur devient connecté et une (ou plusieurs)
        variables de session sont créées.
    -->

    <?php include('header.php');?>
   
    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
               <form action="connexion.php" method="POST">
            <?php 
             if (count($errors) > 0) { ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php  } ?> 
            <div class="form-group">
                <label for="loginGrp"> Login : </label>
                <input type="text" name="username" class="form-control" id="loginGrp">
            </div>
            <div class="form-group">
                <label for="passwordGrp"> Password : </label>
                <input type="password" name="password" class="form-control" id="passwordGrp">
            </div>
            <input class="form-group btn btn-secondary mt-2 mx-2 rounded-pill" type="submit" name="login_user" value="Connexion">
            <p>
                Pas encore membre ? <a href="inscription.php"  class="form-group btn btn-secondary mt-2 mx-2 rounded-pill" id="registerGrp">Sign up</a>
            </p>
        </form>
    </main>

    <?php include('./elements/footer.php');?>

    
    
</body>
</html>