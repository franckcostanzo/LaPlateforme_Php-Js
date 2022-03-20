<?php $title = 'Accueil' ?>
<?php session_start(); 
include('Controller/UserController.php');
?>

<?php ob_start(); ?>
<main>
<h1 class="text-center">
    TODO :<br>
    les items mis en avant<br>
    les derniers articles<br>
    des promos, etc<br>
</h1>

    <?php if(isset($_SESSION)) : ?>
        <pre><?= var_dump($_SESSION) ?></pre>
    <?php endif; ?>
</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>