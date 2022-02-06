<?php include('./service/controller.php'); 
include ('./entity/Reservation.php'); ?>

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
        
    <main class="container-fluid d-flex justify-content-center align-items-center">

        <table>
            <tr>
                <th class="text-center resa2"></th>
                <?php for($i=0;$i<7;$i++) : ?> 
                    <th class="text-center resa2">
                        <?= date("l d M Y", mktime(0, 0, 0, date("m"),date("d")+$i,date("Y"))); ?>
                    </th>
                <?php endfor; ?>
            </tr>
                <?php for($z=0;$z<11;$z++) :?>
                    <tr>      
                        <td class="text-center resa2"><?= 8+$z?> - <?= 8+$z+1?>h</td>
                        <?php   for($y=0;$y<7;$y++) : 
                                    //creating a variable to check the number of the day
                                    $loopDay = date("l d M Y", mktime(0, 0, 0, date("m"),date("d")+$y,date("Y"))); 
                                    $tempLoopDay = new DateTime($loopDay);
                                    $loopDayNumber = $tempLoopDay->format("w");

                                    //getting reservation of the day
                                    $selectQuery = $pdo->prepare("SELECT reservations.id,`titre`,`debut`,`fin`,`description`,`username` 
                                                                    FROM `reservations` INNER JOIN `utilisateurs` 
                                                                    ON reservations.id_utilisateur = utilisateurs.id
                                                                    WHERE `debut` LIKE ?");
                                    $queryDay = date("Y-m-d", mktime(0, 0, 0, date("m"),date("d")+$y,date("Y")))."%";
                                    $selectQuery->execute(array($queryDay));
                                    $reservations = $selectQuery->fetchAll(PDO::FETCH_CLASS, 'reservation');
                                    $rowCount = $selectQuery->rowCount();
                            ?>                                                                
                                
                            <?php //checking loop day to see if it's saturday or sunday  
                                    if ( $loopDayNumber == 6 || $loopDayNumber == 0 ) : ?>
                                    <td class="bg-danger resa2"></td>
                            <?php   elseif ($rowCount >= 1) :
                                        $counter = 0;
                                        for($x=0;$x<$rowCount;$x++) :
                                            $_SESSION['resa'.$x] = $reservations[$x];
                                            $tempId = $_SESSION['resa'.$x]->getUsername();                                   
                                            $tempDate = $_SESSION['resa'.$x]->getDebut();
                                            $tempDate = new DateTime($tempDate); 
                                            $tempHeureDebut = $tempDate->format("H");
                                            $tempDate = $_SESSION['resa'.$x]->getFin();
                                            $tempDate = new DateTime($tempDate);
                                            $tempHeureFin = $tempDate->format("H");
                                            if (($tempHeureDebut <= 8+$z) && (8+$z <= $tempHeureFin)) : $counter++ ?>
                                                <td class="text-center resa2">
                                                    <a href="reservation.php?username=<?= $_SESSION['resa'.$x]->getUsername(); ?>
                                                            &titre=<?=$_SESSION['resa'.$x]->getTitre()?>&debut=<?=$_SESSION['resa'.$x]->getDebut();?>
                                                            &fin=<?=$_SESSION['resa'.$x]->getFin();?>&description=<?=$_SESSION['resa'.$x]->getDescription()?>">
                                                            <div class="border text-center bg-success resa2"><?= $_SESSION['resa'.$x]->getUsername(); ?><br><?=$_SESSION['resa'.$x]->getTitre()?></div>
                                                    </a>
                                                </td>
                                            <?php endif; endfor;
                                        if ($counter == 0) :?>                                      
                                            <td class="text-center border resa2"></td>
                            <?php       endif; 
                                    else :?>
                                <td class="text-center border resa2"></td>
                            <?php   endif;  
                                endfor; ?>                        
                    </tr>
                <?php endfor; ?>                                     
        </table> 


    </main>  

    
</body>
</html>

