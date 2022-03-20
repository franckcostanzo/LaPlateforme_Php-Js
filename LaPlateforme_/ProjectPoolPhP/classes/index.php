<?php include('./entity/userPdo.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
         table, th, td {
            border: 1px solid black;
         }
</style>
<body>
    <?php 
        // $pedro = new User();
        // $pedro->register('pedro','drope','pedro@mexico.me','pedro', 'elsancho');
        $momo = new UserPdo();
        $momo->register('momo','zogzog','momo@zogzog.io','momo','elmacho');
        $momo->connect('momo','zogzog');
        echo "<h2>".(($momo->isConnected() == 1) ? "true" : "false")."</h2><br>";
        $momo->getAllInfos();
        echo $momo->getLogin();        
    ?>
</body>
</html>