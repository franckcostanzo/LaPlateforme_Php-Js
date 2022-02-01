<?php 
    if (isset($_SESSION["score"]))
    {
        echo '<h4 class="text-center mt-1"> Votre meilleur temps : '.$_SESSION["score"].' </h4>';
    }
    else
    {
        echo '<h4 class="text-center mt-1"> Connectez-vous pour enregistrer votre score ! </h4>';
    }
?>