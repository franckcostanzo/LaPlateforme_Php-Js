<?php $title = 'connexion' ?>

<?php include('./elements/header.php');?>

   
<main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
    <form action="connexion.php" method="POST">

        <?php if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                <p><?php echo "<h5 style='color:red;'>".$error."</h5>" ?></p>
                <?php endforeach ?>
            </div>
        <?php  endif; ?>

        <div class="form-group">
            <label for="firstnameGrp"> Firstname : </label>
            <input type="text" name="firstname" class="form-control" id="firstnameGrp">
        </div>

        <div class="form-group">
            <label for="lastnameGrp"> Lastname : </label>
            <input type="text" name="lastname" class="form-control" id="lastnameGrp">
        </div>

        <div class="form-group">
            <label for="emailGrp"> email : </label>
            <input type="text" name="email" class="form-control" id="emailGrp">
        </div>

        <div class="form-group">
            <label for="passwordGrp"> Password : </label>
            <input type="password" name="password" class="form-control" id="passwordGrp">
        </div>

        <input class="form-group btn btn-info mt-2 mx-2 rounded-pill" type="submit" name="login_user" value="Connexion">
        <p>
            Pas encore membre ? <a href="inscription.php" class="form-group btn btn-info mt-2 mx-2 rounded-pill" id="registerGrp">Sign up</a>
        </p>
        
    </form>
</main>    
    
</body>
</html>