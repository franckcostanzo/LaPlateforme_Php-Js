<?php $title = 'Product info' ?>
<?php session_start(); 
include('Controller/UserController.php');
include ('Controller/ProductController.php'); ?>

<?php ob_start(); ?>
<main>
<h1 class="text-center">FAIRE LE DISPLAY PARCE QUE C EST DEGUEULASSE</h1>
    <?php $product = new Product(); $infos = $product->getAllInfo($_GET['id']); $item = $infos[0];?>
    <img src="<?= $item->getImgUrl() ?>">
    <h2><?= $item->getProductName() ?></h2>
    <pre><?= var_dump($infos) ?></pre>
</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>