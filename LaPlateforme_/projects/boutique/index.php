<?php $title = 'Accueil' ?>
<?php session_start(); 
include('Controller/UserController.php'); 
include('Model/Product.php'); 
$product = new Product();
$result = $product->getAllInfo('doudou');
$object =  $result[0];
?>

<?php ob_start(); ?>
<main>
    <?php if(isset($_SESSION)) : ?>
        <pre><?= var_dump($_SESSION) ?></pre>
    <?php endif; ?>
</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>