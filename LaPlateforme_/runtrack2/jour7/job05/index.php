<!--
    Développez le fameux jeu du morpion. Faites un tableau html avec 3 lignes
    et 3 colonnes représentant la grille. Au début de la partie, chacune des
    cases contient un bouton de type submit dont la valeur est “-”. Si un joueur
    clique sur ce bouton, le bouton est remplacé par un “O” ou par un “X”. C’est
    le joueur “X” qui commence.
    Dès qu’un joueur a gagné, affichez “X a gagné” ou “O a gagné” et
    réinitialisez la partie. Si toutes les cases ont été cliquées et que personne
    n’a gagné, affichez “Match nul” et réinitialisez la partie. Un bouton
    “réinitialiser la partie” présent en dessous de la grille permet également de
    réinitialiser la partie à tout moment.
-->
<?php 
    session_start();
    $_SESSION["nbvisites"] = $_SESSION["nbvisites"] +1;
    $wrt = (($_SESSION["nbvisites"] % 2) == 0) ? "X" : "O";
    echo "<h1> Signe du joueur actuel : $wrt </h1><br><br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    
    input, td{
        width:6em;
        height:6em;
    }
</style>
<body>
    <table>
        <tr>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box0"]))
                    { 
                        echo $_COOKIE["Box0"];
                    } 
                    elseif (!isset($_POST["Box0"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box0" value="-"></form>';
                    } 
                ?>
            </td>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box1"]))
                    { 
                        echo $_COOKIE["Box1"];
                    } 
                    elseif (!isset($_POST["Box1"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box1" value="-"></form>';
                    } 
                ?>
            </td>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box2"]))
                    { 
                        echo $_COOKIE["Box2"];
                    } 
                    elseif (!isset($_POST["Box2"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box2" value="-"></form>';
                    } 
                ?>
            </td>
        </tr>
        <tr>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box3"]))
                    { 
                        echo $_COOKIE["Box3"];
                    } 
                    elseif (!isset($_POST["Box3"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box3" value="-"></form>';
                    } 
                ?>
            </td>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box4"]))
                    { 
                        echo $_COOKIE["Box4"];
                    } 
                    elseif (!isset($_POST["Box4"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box4" value="-"></form>';
                    } 
                ?>
            </td>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box5"]))
                    { 
                        echo $_COOKIE["Box5"];
                    } 
                    elseif (!isset($_POST["Box5"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box5" value="-"></form>';
                    } 
                ?>
            </td>
        </tr>
        <tr>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box6"]))
                    { 
                        echo $_COOKIE["Box6"];
                    } 
                    elseif (!isset($_POST["Box6"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box6" value="-"></form>';
                    } 
                ?>
            </td>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box7"]))
                    { 
                        echo $_COOKIE["Box7"];
                    } 
                    elseif (!isset($_POST["Box7"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box7" value="-"></form>';
                    } 
                ?>
            </td>
            <td>                    
                <?php
                    if (isset($_COOKIE["Box8"]))
                    { 
                        echo $_COOKIE["Box8"];
                    } 
                    elseif (!isset($_POST["Box8"]))
                    {
                        echo '<form method="POST"><input type="submit" name="Box8" value="-"></form>';
                    } 
                ?>
            </td>
        </tr>
    </table>

<?php
    		// if(($box[0] == 'x' && $box[1] == 'x' && $box[2] == 'x')  || ($box[3] == 'x' && $box[4] == 'x' && $box[5] == 'x') || ($box[6] == 'x' && $box[7] == 'x' && $box[8] == 'x') || ($box[0] == 'x' && $box[3] == 'x' && $box[6] == 'x')  || ($box[1] == 'x' && $box[4] == 'x' && $box[7] == 'x') || ($box[2] == 'x' && $box[5] == 'x' && $box[8] == 'x') || ($box[0] == 'x' && $box[4] == 'x' && $box[8] == 'x') || ($box[2] == 'x' && $box[4] == 'x' && $box[6] == 'x') )
            // {
            //     $winner = 'x';
            //     Print "<h1>X Wins!</h1>";
            // }
            // elseif (($box[0] == 'o' && $box[1] == 'o' && $box[2] == 'o')  || ($box[3] == 'o' && $box[4] == 'o' && $box[5] == 'o') || ($box[6] == 'o' && $box[7] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[3] == 'o' && $box[6] == 'o')  || ($box[1] == 'o' && $box[4] == 'o' && $box[7] == 'o') || ($box[2] == 'o' && $box[5] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[4] == 'o' && $box[8] == 'o') || ($box[2] == 'o' && $box[4] == 'o' && $box[6] == 'o') )
			// {
			// 	$winner = 'o';
			// 	Print "<h1>O Wins!</h1>";
			// }
?>
    
</body>
</html>