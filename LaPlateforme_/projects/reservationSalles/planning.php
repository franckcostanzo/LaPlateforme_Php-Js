<?php include('./service/controller.php'); ?>

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
    <!-- Sur cette page on voit le planning de la semaine avec l’ensemble des
    réservations effectuées. Le planning se présente sous la forme d’un
    tableau avec les jours de la semaine en cours. Dans ce tableau, il y a en
    colonne les jours et les horaires en ligne. Sur chaque réservation, il est
    écrit le nom de la personne ayant réservé la salle ainsi que le titre. Si un
    utilisateur clique sur une réservation, il est amené sur une page dédiée.
    Les réservations se font du lundi au vendredi et de 8h à 19h. Les créneaux
    ont une durée fixe d’une heure. -->    
    
    <?php include('./elements/header.php');?>
        

    <main>
    <div class="container-fluid d-flex justify-content-center">
	<div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-2 border d-flex justify-content-center align-items-center" id="resa"><p>/</p></div>
            </div>
        <?php for ($i=0;$i<11;$i++) : ?>
            <div class="row">
                <div class="col-md-2 border d-flex justify-content-center align-items-center" id="resa">
                    <?= 8+$i?>h - <?= 9+$i?>h
                </div>
            </div>
        <?php endfor; ?>
        </div>
		<div class="col-md-10">
			<div class="row">				
				<div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                    lundi
				</div>
				<div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                    mardi
				</div>
				<div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                    mercredi
				</div>
				<div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                    jeudi
				</div>
				<div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                    vendredi
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

