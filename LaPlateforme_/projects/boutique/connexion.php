<?php $title = 'connexion' ?>
<?php session_start(); include('Controller/UserController.php') ?>
  
<?php ob_start(); ?>
<main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">

    <img src="Elements/Media/connexion.png" alt="logo" id="sectionHead">

    <h1 class="text-center">Connexion</h1>
    
    <div class="formulaire">
        <fieldset class="bg-dark">

            <form action="connexion.php" method="POST">
                <?php if (count($errors) > 0) : ?>
                    <div class="error">
                        <?php foreach ($errors as $error) : ?>
                        <p><?php echo "<h5 style='color:red;'>".$error."</h5>" ?></p>
                        <?php endforeach ?>
                    </div>
                <?php  endif; ?>    
                <div class="form-group">
                    <label for="emailGrp"> email : </label>
                    <input type="text" name="email" class="form-control" id="emailGrp">
                </div>

                <div class="row my-1">
                    <div class="form-group col-md-6">
                        <label for="passwordGrp"> Password : </label>
                        <input type="password" name="password" class="form-control" id="passwordGrp">                    
                    </div>
                    <div class="d-flex flex-row justify-content-center col-md-6">
                        <input class="form-group btn btn-warning rounded-pill m-2" 
                    type="submit" name="login_user" value="Connexion">
                    </div>              
                </div>
            </form>
            
            <p class="d-flex justify-content-center align-items-center my-1">
                Pas encore membre ? <a href="inscription.php" class="btn btn-warning m-2 rounded-pill" id="registerGrp">Sign up</a>
            </p>
        </fieldset>

    </div>

</main>
<!-- <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center"> -->

</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>