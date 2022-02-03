<?php include('./service/controller.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation de Salle</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>  
</head>
<body>
       
    <?php include('./elements/header.php');?>

    <?php
        $today = date("l d M Y");
        $tempDay = new DateTime($today);
        $dayNumber =  $tempDay->format("w");
        echo $today."<br>".$dayNumber;
        $dayPlus1 = date("l d M Y", mktime(0, 0, 0, date("m"),date("d")+1,date("Y")));
        $dayPlus2 = date("l d M Y", mktime(0, 0, 0, date("m"),date("d")+2,date("Y")));
        $dayPlus3 = date("l d M Y", mktime(0, 0, 0, date("m"),date("d")+3,date("Y")));
        $dayPlus4 = date("l d M Y", mktime(0, 0, 0, date("m"),date("d")+4,date("Y")));
    ?>
        

    
    <main class="container-fluid d-flex justify-content-center">
        <div class="row">

            <div class="col-md-2">
                <div class="row">
                    <div class="border d-flex justify-content-center align-items-center" id="resa"><p>/</p></div>
                </div>
            <?php for ($i=0;$i<11;$i++) : ?>
                <div class="row">
                    <div class="border d-flex justify-content-center align-items-center" id="resa">
                        <?= 8+$i?>h - <?= 9+$i?>h
                    </div>
                </div>
            <?php endfor; ?>
            </div>

            <div class="col-md-10">
                <div class="row">
                <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $today ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $dayPlus1 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $dayPlus2 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $dayPlus3 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $dayPlus4 ?>
                        </div>
                </div>
            <?php $i = 0; for ($y=0;$y<11;$y++) :?>
                <form class="row" method="POST">
                <?php while(true) :?>
                    <button class="col-md-2 d-flex justify-content-center align-items-center" type="submit" id="resa">
                    </button>
                <?php $i++; if ($i % 5 == 0) {break;} ?>
                <?php endwhile; ?>
                </form>
            <?php endfor; ?>
            </div>
    


    </main>  

    
</body>
</html>

