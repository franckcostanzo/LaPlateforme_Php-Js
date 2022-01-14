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
        <input type="number" name="largueur">
        <input type="number" name="hauteur">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
        $halfWidth = (($_POST["largeur"] % 2) == 0) ? floor($_POST["largeur"]/2) - 1 : floor($_POST["largeur"]/2);
        $halfHeight = $_POST["hauteur"]/2;

    ?>
     
</body>
</html>