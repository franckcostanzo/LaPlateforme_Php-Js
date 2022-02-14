<?php $title = 'Profil' ?>

<?php include('./elements/header.php');?>

<main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
    <?php
        if (isset($_SESSION['firstname']))
        {
            
    ?>
        <form action="profil.php" method="POST">
            <?php 
            if (count($errors) > 0) { ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                    <p><?php echo "<h5 style='color:red;'>".$error."</h5>" ?></p>
                    <?php endforeach ?>
                </div>
            <?php  } ?> 
            <div class="form-group">
                <label for="oldPasswordGrp"> Old password : </label>
                <input type="password" name="oldPassword" class="form-control" id="oldPasswordGrp">
            </div>
            <div class="form-group">
                <label for="passwordGrp"> New password : </label>
                <input type="password" name="new_password_1" class="form-control" id="passwordGrp">
            </div>
            <div class="form-group">
                <label for="passwordConfirmGrp"> Confirm new password : </label>
                <input type="password" name="new_password_2" class="form-control" id="passwordconfirmGrp">
            </div>
            <input class="form-group btn btn-info mt-2 mx-2 rounded-pill" type="submit" name="pwd_chg" value="Change Password">
        </form>
    <?php  }
        else
        {
    ?>
        <h3>Vous n'êtes pas connecté !</h3>
        <p>
            Pas encore membre ? <a href="inscription.php"  class="form-group btn btn-info mt-2 mx-2 rounded-pill" id="registerGrp">Sign up</a>
        </p>
    <?php
        }
    ?>
</main>

    

</body>
</html>