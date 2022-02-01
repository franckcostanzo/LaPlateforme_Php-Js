<?php 
include('./service/controller.php');
include('./entity/Plateau.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>  
</head>
<body>    
    
    <?php include('./elements/header.php');
        if (!isset($_SESSION['count'])) {$_SESSION['count'] = 0;}
        $istore = [];
        $firstCard;
        if (!(isset($_SESSION['plateau']))) 
        {
            echo "YOUPI<br>";
            $_SESSION['plateau'] = new Plateau;
            $_SESSION['array'] = ($_SESSION['plateau']->getMyArray());
            for($i=0;$i<12;$i++){
                $_SESSION['card'.$i] = $_SESSION['array'][$i];
                var_dump($_SESSION['card'.$i]);
                echo "<br>";
            }    
        };
        for ($i=0;$i<12;$i++){
            if (isset($_POST['card'.$i]))
            {                
                $_SESSION['count']++;
                array_push($istore, $i);
                $_SESSION['card'.$i]->setisDiscovered(true);
                $_SESSION['temp'.$_SESSION['count']] = $_SESSION['card'.$i];
            }
        }
        print_r($istore); echo "<br>";
        echo $_SESSION['count']; echo "<br>";
        if ($_SESSION['count'] == 2)
        {
            var_dump($_SESSION['temp'.$_SESSION['count']]); echo "<br>";
            var_dump($_SESSION['temp'.($_SESSION['count']-1)]); 
            if ($_SESSION['temp'.$_SESSION['count']] !== $_SESSION['temp'.($_SESSION['count']-1)])
            {
                $_SESSION['card'.$istore[0]]->setisDiscovered(false);
                $_SESSION['card'.$istore[1]]->setisDiscovered(false);
                $istore = array();
            }
            $_SESSION['count'] = 0;
        }

    ?>   

    <main class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-9 p-2" id="gamePlan">
                        
                    <?php 
                        $i = 0;
                        for ($y=0;$y<3;$y++) :?>
                        <form class="d-flex justify-content-center" method="POST">
                            <?php while(true) :?>                            
                                <button type="submit" name=<?="card".$i?> value=true class="card" >
                                    <?php if( isset($_SESSION['card'.$i]) && $_SESSION['card'.$i]->getisDiscovered() ) : ?>
                                        <img src=<?= $_SESSION['card'.$i]->getimgSrc()?> alt=<?='card'.$i?> id=<?='card'.$i?>>
                                    <?php else : ?>
                                        <img src="./media/back.png" alt=<?='card'.$i?> id=<?='card'.$i?>>
                                    <?php endif; ?>
                                </button>
                            <?php 
                            $i++;
                            if ($i % 4 == 0) {break;}
                            endwhile; ?>
                        </form>
                        <?php endfor; ?>
                        

                    </div>
                    <div class="col-md-3 text-center p-2" id="ladder">
                        <h2>Meilleures Scores :</h1>
                        <?php
                            $pdo = DbconnectPDO::dbconnect();
                            $selectQuery = $pdo->prepare("SELECT `username`,`score` FROM `utilisateurs` order by score");
                            $selectQuery->execute();
                            $rows = $selectQuery->fetchAll();
                            for ($i = 0; $i <10; $i++)
                            {
                                if (isset($rows[$i]))
                                {
                                $place = ($i+1);
                                echo $place.'. '.$rows[$i]["username"].' - score : '.$rows[$i]["score"]."<br>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
    <?php include('./elements/footer.php');?>    

    
</body>
</html>