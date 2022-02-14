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
            <input type="password" name="password_1" class="form-control" id="passwordGrp">
        </div>        
        <div class="form-group">
            <label for="passwordConfirmGrp"> Confirm Password : </label>
            <input type="password" name="password_2" class="form-control" id="passwordConfirmGrp">
        </div>
        <div class="form-group">
            <label for="phoneGrp"> phone number : </label>
            <input type="text" name="phone" class="form-control" id="phoneGrp">
        </div>
        <div class="form-group">
            <label for="dateGrp"> Date : </label>
            <input type="date" name="birthday" class="form-control" id="dateGrp"></textarea>
        </div>
        <div class="form-group">
            <label for="addressGrp"> Address : </label>
            <input type="text" name="address" class="form-control" id="addressGrp">
        </div>
        <div class="form-group">
            <label for="zipcodeGrp"> Zip Code : </label>
            <input type="text" name="zipCode" class="form-control" id="zipcodeGrp">
        </div>
        <input class="form-group btn btn-info mt-2 mx-2 rounded-pill" type="submit" name="reg_user" value="Register">
        <p>
            Already a member? <a href="connexion.php" class="form-group btn btn-info mt-2 mx-2 rounded-pill">Sign in</a>
        </p>
    </form>
</main>

</body>
</html>