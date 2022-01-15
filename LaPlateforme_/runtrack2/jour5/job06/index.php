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
function leetspeak(string $str): string
{
    $x=0;
    while (isset($str[$x]))
    {
        $x++;
    }
    for ($i=0; $i<$x;$i++)
    {
        if ( $str[$i] == "A" || $str[$i] == "a")
        {
            $str[$i] = "4";
        }
        elseif ( $str[$i] == "B" || $str[$i] == "b")
        {
            $str[$i] = "8";
        }
        elseif ( $str[$i] == "E" || $str[$i] == "e")
        {
            $str[$i] = "3";
        }
        elseif ( $str[$i] == "G" || $str[$i] == "g")
        {
            $str[$i] = "6";
        }
        elseif ( $str[$i] == "L" || $str[$i] == "l")
        {
            $str[$i] = "1";
        }
        elseif ( $str[$i] == "S" || $str[$i] == "s")
        {
            $str[$i] = "5";
        }
        elseif ( $str[$i] == "T" || $str[$i] == "t")
        {
            $str[$i] = "7";
        }
    }
    return $str;
}
$test ="Comme un Lameur sur un skyblog,
Je te regarde à la webcam.
Tel Gandalf contre un Balrog,
Dés que j'te vois, j'me met à ram.

Si le monde était en binaire,
Dans tout les 1 et les 0,
On verrait ton 2, le très beau;
Celui qui te rends légendaire.

Nous c'est comme un bug sous Linux,
Toujours possible mais introuvable.
Tu me fais tourner en carrer,
Sans passer par l'hypothénuse.

Quand j'pense à toi j'pense pas a wow,
Quand je te vois j'arrête counter,
Je t'appercoit, j'quitte le server,
Et je viens te dire bonjour now.

On fait Backtab a un dragon,
On va jouer serveur privé,
On go Xp sur sanglier,
Dans c'cas on assume et on Rhon.

T'es mon oiseau de Paradis,
T'es ma Dinde Ebene Ivoire;
T'es mon Mox, mon Lotus noir;
T'es ma Bora ma Dague Luti.

Le théorème de Cupidon,
Dit que le carré de l'amour;
Est bien la somme des deux ronds,
Avec un triangle comme contour.";
echo leetspeak($test);

?>
    
</body>
</html>