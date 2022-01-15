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

function occurences(string $str, string $char)
{
    if (!isset($char[1]))
    {
        $count=0;
        $x=0;
        while (isset($str[$x]))
        {
            $x++;
        }
        for ($i=0;$i<$x;$i++)
        {
            if ($str[$i] == $char)
            {
                $count++;
            }
        }
        echo "il y a $count <b>$char</b> <br> dans ''$str''";
    }
    else
    {
        echo "les paramêtres sont faux!";
    }
    
}

$test ="Une phrase est constituée d'un ou plusieurs mots, de différentes natures et fonctions, reliés entre eux. Elle commence par une majuscule et se termine par une ponctuation forte (point final, point d'exclamation, point d'interrogation, points de suspension).";
occurences($test,"a");


?>
    
</body>
</html>