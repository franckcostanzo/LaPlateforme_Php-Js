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
        $str="LaPlateforme";
        $str2="Vive";
        $str3="!";
        $val=6;

        echo $str2 . " " . $str . " " . $str3 . "<br>";

        echo "La variable val a pour valeur " . $val . "<br>";

        $val += 4;

        echo "En ajoutant 4, la variable val a pour valeur " . $val . "<br>";

        $myBool = true;

        echo "La variable myBool a pour valeur " . (($myBool) ? 'true' : 'false') . "<br>";

        $myBool = false;

        echo "Maintenant, la variable myBool a pour valeur " . (($myBool) ? 'true' : 'false') . "<br>";
    ?>
</body>
</html>