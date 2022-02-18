<?php $title = 'Admin Space' ?>
<?php session_start(); include('Controller/UserController.php') ?>

<?php ob_start(); ?>
<main>
<h1 class="text-center">Y A RIEN FFS!</h1>

</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>