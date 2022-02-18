<?php $title = 'Boutique' ?>
<?php 
session_start(); 
include('Controller/UserController.php'); 
include ('Controller/ProductController.php'); 
?>

<?php ob_start(); ?>
<main>
    <h1 class="text-center">FAIRE LA GESTION CATEGORIES ET LE DISPLAY PARCE QUE C EST DEGUEULASSE</h1>
    <?php $product = new Product();
    $products = $product->getAllProducts(); 
    $count = 0;?>
    
    <?php foreach ($products as $temp) :?>
        <?php if($count == 0 || $count % 4 == 0) :?>
            <div class="d-flex flex-row justify-content-center align-items-center">
        <?php endif; ?>
        
        <div class="d-flex flex-column m-3">
            <img src="<?= $temp->getImgUrl()?>" id="shopProductImg">
            <a href="product.php?id=<?= $temp->getId()?>"><h4><?= $temp->getProductName()?><h4></a>
            <p><?= $temp->getUnitPrice() ?>€</p>
        </div>

        <?php $count++; 
        if ($count % 4 == 0) :?>
            </div>
        <?php endif; ?>
        
    <?php endforeach; ?>
    <br>
</main>
<?php $content = ob_get_clean();?>

<?php require ('Elements/gabarit.php'); ?>