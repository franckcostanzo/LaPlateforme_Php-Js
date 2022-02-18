<?php $title = 'Profil' ?>
<?php session_start(); include('Controller/UserController.php') ?>

<?php ob_start(); ?>
<main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
    <?php if (isset($_SESSION['firstname'])) : ?>
        <img src="Elements/Media/password.png" alt="logo" id="sectionHead">
            
        <h1 class="titreformulaire text-center">Mon Compte</h1>
        <fieldset class="bg-dark my-2">
            <h2 class="text-center">Information</h2>
            <div class="row">
                
                <form action="#" method="POST">
                    <div class="row my-1">
                        <div class="form-group col-md-6">
                            <label for="firstnameGrp"> Firstname : </label>
                            <input type="text" name="firstname" class="form-control" id="firstnameGrp" value="<?= $_SESSION["firstname"] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastnameGrp"> Lastname : </label>
                            <input type="text" name="lastname" class="form-control" id="lastnameGrp" value="<?= $_SESSION["lastname"] ?>">
                        </div>
                    </div>
                    <div class="form-group my-1">
                        <label for="emailGrp"> Email : </label>
                        <input type="text" name="email" class="form-control" id="emailGrp" value="<?= $_SESSION['email'] ?>">
                    </div>
                    <div class="row my-1">
                        <div class="form-group col-md-6">
                            <label for="phoneGrp"> Phone number : </label>
                            <input type="text" name="phone" class="form-control" id="phoneGrp" value="<?= $_SESSION['phone'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dateGrp"> Birthday : </label>
                            <input type="date" name="birthday" class="form-control" id="dateGrp" value="<?= $_SESSION['birthday']?>"></textarea>
                        </div>
                    </div>
                    <div class="form-group my-1">
                        <label for="addressGrp"> Address : </label>
                        <input type="text" name="address" rows="3" class="form-control" id="addressGrp" value="<?= $_SESSION["address"] ?>" required></textarea>
                    </div>

                    <div class="row my-1">
                        <div class="form-group col-md-6">
                            <label for="zipcodeGrp"> Zip Code : </label>
                            <input type="text" name="zipCode" class="form-control" id="zipcodeGrp" value="<?= $_SESSION["zipCode"] ?>">
                        </div>
                    </div>
                    <input class="form-group btn btn-warning rounded-pill my-2" type="submit" name="chg_infos" value="Changer mes infos">
                </form>
            </div>
        </fieldset> 
        <fieldset class="bg-dark">
            <h2 class="text-center">Changement Mot de Passe</h2>
            <form action="profil.php" method="POST" class="d-flex flex-column justify-content-center">
                <?php 
                if (count($errors) > 0) { ?>
                    <div class="error">
                        <?php foreach ($errors as $error) : ?>
                        <p><?php echo "<h5 style='color:red;'>".$error."</h5>" ?></p>
                        <?php endforeach ?>
                    </div>
                <?php  } ?>
                
                <div class="form-group col-md-6">
                    <label for="oldPasswordGrp"> Old password : </label>
                    <input type="password" name="oldPassword" class="form-control" id="oldPasswordGrp">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="passwordGrp"> New password : </label>
                        <input type="password" name="new_password_1" class="form-control" id="passwordGrp">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="passwordConfirmGrp"> Confirm new password : </label>
                        <input type="password" name="new_password_2" class="form-control" id="passwordconfirmGrp">
                    </div>
                </div>
                <input class="form-group btn btn-warning my-4 mx-2 rounded-pill" type="submit" name="pwd_chg" value="Change Password">
            </form>
        </fieldset>
    <?php else : ?>
        <h3>Vous n'êtes pas connecté !</h3>
        <p>
            Pas encore membre ? <a href="inscription.php"  class="form-group btn btn-info mt-2 mx-2 rounded-pill" id="registerGrp">Sign up</a>
        </p>
    <?php endif; ?>
</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>