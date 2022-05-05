<?php $title = "Log In" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php'); ?>
<?php require_once('Controller/user_controller.php'); ?>


<?php   ob_start();  ?>

<div class="container mt-3">

    <form action="" method="POST">

        <!-- Username -->
        <div class="row d-flex justify-content-center">
            <div class="form-group col-6 text-center" >
                <label for="username">Username</label>
                <input type="text" class="form-control p-1 px-2 rounded-1" id="username" name="username">
            </div>
        </div>

        <!-- Password -->
        <div class="row d-flex justify-content-center">
            <div class="form-group col-6 text-center">
                <label for="password">Password</label>
                <input type="password" class="form-control p-1 px-2 rounded-1" id="password" name="password">
            </div>
        </div>
        
        <!-- Submit -->
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary mt-5 mx-2 p-2  rounded-pill" name="submit_connection">Connect</button>
        </div>

    </form>

</div>
<?php  $content=ob_get_clean(); ?>

<?php require ('View/layout.php'); ?>