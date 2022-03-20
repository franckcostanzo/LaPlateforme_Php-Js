<?php if (isset($_SESSION["username"])) : ?>
    <h4 class="text-center mt-1"> Votre meilleur score : <?= $_SESSION["score"]?> </h4>
    <?php else : ?>
    <h4 class="text-center mt-1"> Connectez-vous pour enregistrer votre score ! </h4>
<?php endif?>