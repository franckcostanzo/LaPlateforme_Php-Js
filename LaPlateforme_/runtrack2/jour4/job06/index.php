<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="GET">
        <input type="number" name="nombre">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
        if(($_GET["nombre"]%2)==0)
        {
            echo $_GET["nombre"]." est un nombre pair";
        }
        else
        {
            echo $_GET["nombre"]." est un nombre impair";
        }
    ?>
</body>
</html>