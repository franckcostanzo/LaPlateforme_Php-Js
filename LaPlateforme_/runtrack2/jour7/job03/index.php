<!--
Créez un formulaire qui contient un input de type de text nommé “prenom”
et un bouton submit. Lorsque l’on valide le formulaire, le prénom est ajouté
dans une variable de session. Afficher l’ensemble des prénoms.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser la liste
-->
<?php
    session_start();
    if (isset($_POST["reset"]))
        {
            $_SESSION["prenomTab"]  = array();  
        }
    if(!isset($_SESSION["prenomTab"]))
    {
        $_SESSION["prenomTab"]  = array();
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
    <form action="" method="POST">
        <input type="text" name="prenom">
        <input type="submit" name="submit" value="submit">
    </form>
    <form action="" method="POST">
        <input type="submit" value="reset" name="reset">
    </form>
<?php
    if(isset($_POST["submit"]))
    {
        array_push($_SESSION["prenomTab"], $_POST["prenom"]);
    }

    if(isset($_SESSION["prenomTab"]))
    {
        foreach ($_SESSION["prenomTab"] as $name)
        {
            echo $name."<br>";
        }
    }    
?>
    
</body>
</html>