<?php $title = 'inscription' ?>
<?php session_start(); include('Controller/UserController.php') ?>

<?php ob_start(); ?>
<main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">

    <h1 class="text-center">Inscription</h1>
    
    <fieldset>

        <form action="inscription.php" class="d-flex flex-column justify-content-center" method="POST">
            
            <?php if (count($errors) > 0) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                    <p><?php echo "<h5 style='color:red;'>".$error."</h5>" ?></p>
                    <?php endforeach ?>
                </div>
            <?php  endif; ?>
            
            <div class="form-group my-1">
                <label for="loginGrp"> Login : </label>
                <input type="text" name="login" class="form-control" id="loginGrp">
            </div>

            <div class="row my-1">
                <div class="form-group col-md-6">
                    <label for="passwordGrp"> Password : </label>
                    <input type="password" name="password_1" class="form-control" id="passwordGrp">
                </div>        
                <div class="form-group col-md-6">
                    <label for="passwordConfirmGrp"> Confirm Password : </label>
                    <input type="password" name="password_2" class="form-control" id="passwordConfirmGrp">
                </div>
            </div>

            <input class="form-group btn btn-success rounded-pill my-2" type="submit" name="reg_user" value="Register">
            
        </form>
        
        <p class="d-flex justify-content-center align-items-center my-1">
            Already a member? 
            <a href="connexion.php" class="btn btn-success m-2 rounded-pill">Sign in</a>
        </p>
        
    </fieldset>

</main>
<?php $content = ob_get_clean();?>

<?php require ('View/layout.php'); ?>