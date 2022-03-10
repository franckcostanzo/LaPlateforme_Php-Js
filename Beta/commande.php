<?php $title = "detail commande" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php'); ?>
<?php require_once('Model/Cart.php'); ?>
<?php require_once('Model/Contient.php'); ?>
<?php require_once('Model/Produit.php'); ?>
<?php require_once('Model/Commande.php'); ?>

<?php require_once('Controller/user_controller.php');   // Models : User  &  Cart  ?>
<?php require_once('Controller/commande_controller.php'); // Models : User  &  Cart  &  Contient  &  Produits  &  Commandes ?>


<?php   ob_start();  ?>
<div class="d-flex flex-row justify-content-center align-items-center">

    
    <div class="shadow-sm p-5 mb-5 border border-light border-1 px-4 mt-4">
        <table class="table px-4 mt-4 mb-4">
            <tr>
                <th class="h-1 px-4 mt-4 mb-4">
                    <b>Commande n. <?= $id_comm; ?>
                        <span> date: <?= $comm[0]['date_commande'] ?></b></span>
                </th>
            </tr>
            <?php if(isset($_SESSION['connected']) and isset($comm)): ?>
                <tr class="row shadow-sm p-3 mb-5 rounded-2 text-center">
                    <?php  $tot=0; ?>
                    <th class="col-md-2 px-3" >Quantité</th>
                    <th class="col-md-2 px-3" >Image</th>
                    <th class="col-md-2 px-2" >Nom Produit</th>
                    <th class="col-md-2 px-2" >Prix Total par produit</th>
                    <th class="col-md-2 px-2" >Date</th>
                </tr>
                <?php for($i=0;$i<=isset($comm[$i]);$i++): $tot+=$comm[$i]['price'];?>
                    <tr class="row shadow-sm rounded-2">
                        <td class="col-md-2 mt-1 px-2 text-center" ><?= $comm[$i]['quantité'] ?></td>
                        <td class="col-md-2 mt-3 px-2 h-25" ><img src="<?= $comm[$i]['img_url'] ?>" class="prodPics"></td>
                        <td class="col-md-2 mt-1 px-2 text-center" ><?= $comm[$i]['nom_produit'] ?></td>
                        <td class="col-md-2 mt-1 px-2 text-center" ><?= $comm[$i]['price'] ?></td>
                        <td class="col-md-2 mt-1 px-2 text-justify" ><?= substr($comm[$i]['date_commande'],0,16) ?></td>
                    </tr>
                <?php endfor; ?>
                <tr>
                    <th class="col px-4 mt-4 mb-4">
                        Order Total Price: <?= $tot ?>
                        Paid with: <?= $comm[0]['nom_paiement'] ?>
                    </th>
                </tr>
            <?php else: ?>
                <tr>
                    <th>
                        <b class="lead"> you don't have any order yet </b>
                    </th>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<?php  $content=ob_get_clean(); ?>

<?php require ('View/patron.php'); ?>