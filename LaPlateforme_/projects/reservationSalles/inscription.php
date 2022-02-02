<?php include('./service/controller.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php include('./elements/header.php');?>

    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
        <form action="inscription.php" method="POST">
            <?php 
             if (count($errors) > 0) { ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                    <p><?php echo "<h5 style='color:red;'>".$error."</h5>" ?></p>
                    <?php endforeach ?>
                </div>
            <?php  } ?> 
            <div class="form-group">
                <label for="loginGrp"> Username : </label>
                <input type="text" name="username" class="form-control" id="username">
            </div>            
            <div class="form-group">
                <label for="passwordGrp"> Password : </label>
                <input type="password" name="password_1" class="form-control" id="passwordGrp">
            </div>
            <div class="form-group">
                <label for="passwordConfirmGrp"> Confirm Password : </label>
                <input type="password" name="password_2" class="form-control" id="passwordConfirmGrp">
            </div>
            <input class="form-group btn btn-danger mt-2 mx-2 rounded-pill" type="submit" name="reg_user" value="Register">
            <p>
                Already a member? <a href="connexion.php" class="form-group btn btn-danger mt-2 mx-2 rounded-pill">Sign in</a>
            </p>
        </form>
    </main>

</body>
</html>