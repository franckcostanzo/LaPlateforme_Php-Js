<?php $title = 'home' ?>
<?php session_start(); include('Controller/UserController.php');?>

<?php ob_start(); ?>
<main class="my-3 mx-5 px-5 d-flex flex-column align-items-center">
    <h1>YOUPI !</h1>
    <div class="w-25">
        <img src="View/Media/bear.gif" id="myImg" alt="J'ai disparu !">
    </div>
</main>
<?php $content = ob_get_clean();?>

<?php require ('View/layout.php'); ?>