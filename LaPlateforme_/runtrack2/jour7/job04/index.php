<!--
    Créez un formulaire de connexion qui contient un input de type de text
    nommé “prenom” et un bouton submit nommé “connexion”. Lorsque l’on
    valide le formulaire, le prénom est ajouté dans un cookie. Si un utilisateur a
    déjà entré son prénom n'affichez plus le formulaire de connexion. A la
    place, écrivez “Bonjour prenom !” et ajouter un bouton “Déconnexion”
    nommé “deco”. Lorsque l’utilisateur se déconnecte, il faut à nouveau
    afficher le formulaire de connexion.
-->
<?php
    if (isset($_POST["connexion"],$_POST["prenom"]))
    {
        setcookie("prenom", $_POST["prenom"]);
    }
    elseif (isset($_POST["deconnexion"]))
    {
        setcookie("prenom", '', time() - 3600);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_COOKIE["prenom"]))
        {            
    ?>

     <form action="index.php" method="post">
        <input type="text" name="prenom">
        <input type="submit" name="connexion" value="connexion">
    </form>

    <?php
        }
        else
        {
            echo "Bonjour ".$_COOKIE["prenom"];
    ?>

    <form action="index.php" method="post">
        <input type="submit" name="deconnexion" value="deconnexion">
    </form>

    <?php
        }
    ?>
    
</body>
</html>