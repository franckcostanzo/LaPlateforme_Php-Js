<?php
$str="Dans l'espace, personne ne vous entend crier";
$x=0;
while (isset($str[$x]))
{
    $x++;
}
echo ("<h1>Le nombre de lettres dans la phrase<br>"
    . "''Dans l'espace, personne ne vous entend crier''<br>"
    . "est : $x</h1>");
?>