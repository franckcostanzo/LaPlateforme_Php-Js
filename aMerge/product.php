<?php $title = 'Admin Space' ?>
<?php session_start(); include('Controller/UserController.php') ?>

<?php ob_start(); ?>
<main>

</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>