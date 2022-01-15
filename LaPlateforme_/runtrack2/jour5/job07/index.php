<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
    <input type="text" name="str">
    <select name="fonction">
        <option value="" disabled selected>Choose an option</option>
        <option value="gras">gras</option>
        <option value="cesar">cesar</option>
        <option value="plateforme">plateforme</option>>
    </select>
    <input type="submit" value="Submit MOFO!">

</form>
<?php

    function toBold(string $myStr)
    {
        echo "<b>".$myStr."</b>";
        
    }

    function moveLetter(string $str)
    {
        $char="";
        $x=0;
        while (isset($str[$x]))
        {
            $x++;
        }
        for ($i=0;$i<$x;$i++)
        {
            if ($i==0)
            {
                $char = $str[0];
            }
            if(isset($str[$i+1]))
            {
                $str[$i] = $str[$i+1];
            }
            else
            {
                $str[$i] = $char;
            }
        
        }
        echo $str;
    }

    function plateformated(string $myStr)
    {
        $x=0;
        while (isset($myStr[$x]))
        {
            $x++;
        }
        if (($myStr[$x-2]) == "m" && ($myStr[$x-1]) == "e")
        {
            echo $myStr."_";
        }
    }

    if (isset($_POST))
    {
        if (isset($_POST["fonction"]))
        {
            switch ($_POST["fonction"])
            {
                case "gras":
                    toBold($_POST["str"]);
                case "cesar":
                    moveLetter($_POST["str"]);
                case "plateforme":
                    plateformated($_POST["str"]);
            }

        }
        
    }

?>
    
</body>
</html>