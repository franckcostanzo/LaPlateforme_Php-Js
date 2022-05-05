<?php $title = "Register" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php'); ?>
<?php require_once('Controller/user_controller.php'); ?>


<?php   ob_start();  ?>
        
<div class="container mt-3" >

    <form action=""  method="POST">

        <!-- username -->
        <div class="row d-flex justify-content-center">
            <div class="form-group col-6 text-center">
                <label for="username">Username</label>
                <input type="text" class="form-control rounded-0" id="username" name="username">
            </div>
        </div>

        <!-- Email -->
        <div class="row d-flex justify-content-center" >
            <div class="form-group col-sm-8 col-lg-6 text-center">
                <label for="email" >Email</label>
                <input type="text" class="form-control rounded-0" id="email" name="email">
            </div>                    
        </div>

        <!-- Password -->
        <div class="row d-flex justify-content-center" >
            <div class="form-group col-6 text-center">
                <label for="password1">Password</label>
                <input type="password" class="form-control rounded-0" id="password1" name="password_1">
            </div>            
        </div>

        <!-- Password confirmation -->
        <div class="row d-flex justify-content-center" >
            <div class="form-group col-6 text-center">
                <label for="password2">Password Confirmation</label>
                <input type="password" class="form-control rounded-0" id="password2" name="password_2">
            </div>
        </div>

        <!-- Submit -->
        <div class="d-flex justify-content-center align-items-center" >                
            <button type="submit" class="btn btn-primary mt-5 mx-2 p-2  rounded-pill" name="submit_subscription">Register</button>
        </div>

    </form>

</div>

<?php  $content=ob_get_clean(); ?>

<?php require ('View/layout.php'); ?>