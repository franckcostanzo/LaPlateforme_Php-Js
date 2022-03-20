<?php $title = 'inscription' ?>
<?php session_start(); include('Controller/UserController.php') ?>

<?php ob_start(); ?>
<main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">

    <img src="Elements/Media/inscription.png" alt="logo" id="sectionHead">
    <h1 class="titreformulaire text-center">Inscription</h1>
    
    <fieldset class="bg-dark">
        <form action="inscription.php" class="d-flex flex-column justify-content-center" method="POST">
            <?php 
                if (count($errors) > 0) { ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                    <p><?php echo "<h5 style='color:red;'>".$error."</h5>" ?></p>
                    <?php endforeach ?>
                </div>
            <?php  } ?>
            <div class="row my-1">
                <div class="form-group col-md-6">
                    <label for="firstnameGrp"> Firstname : </label>
                    <input type="text" name="firstname" class="form-control" id="firstnameGrp">
                </div>
                <div class="form-group col-md-6">
                    <label for="lastnameGrp"> Lastname : </label>
                    <input type="text" name="lastname" class="form-control" id="lastnameGrp">
                </div>
            </div>

            
            <div class="form-group my-1">
                <label for="emailGrp"> Email : </label>
                <input type="text" name="email" class="form-control" id="emailGrp">
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

            <div class="row my-1">
                <div class="form-group col-md-6">
                    <label for="phoneGrp"> Phone number : </label>
                    <input type="text" name="phone" class="form-control" id="phoneGrp">
                </div>
                <div class="form-group col-md-6">
                    <label for="dateGrp"> Birthday : </label>
                    <input type="date" name="birthday" class="form-control" id="dateGrp"></textarea>
                </div>
            </div>
            
            <div class="form-group my-1">
                <label for="addressGrp"> Address : </label>                    
                <input type="text" name="address" class="form-control" id="addressGrp">
            </div>

            <div class="row my-1">
                <div class="form-group col-md-6">
                    <label for="zipcodeGrp"> Zip Code : </label>
                    <input type="text" name="zipCode" class="form-control" id="zipcodeGrp">
                </div>
            </div>
            <input class="form-group btn btn-warning rounded-pill my-2" type="submit" name="reg_user" value="Register">
            
        </form>
        <p class="d-flex justify-content-center align-items-center my-1">
            Already a member? 
            <a href="connexion.php" class="btn btn-warning m-2 rounded-pill">Sign in</a>
        </p>
        
    </fieldset>

</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>