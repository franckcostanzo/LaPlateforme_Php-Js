<?php 
    session_start(); 
    require_once('./Controller/searchController.php');
    require_once('./Model/Pokemon.php');
    $pokemon = Pokemon::getPokemonById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Css/style.css">
    <link rel="stylesheet" type="text/css" href="./Css/bootstrap.min.css">
    <script src="./Js/script.js"></script>
    <title>Element</title>
</head>
<body class="d-flex flex-column justify-content-center align-items-center w-100">
    
    <section class="m-5 p-5 w-75 h-75 container border">
        <h1 class="text-center"><?= $pokemon["nom"] ?></h1>
        <div class="row text-center mt-5">
            <p class="col-4"><span class="fw-bold">id : </span><?= $pokemon["id"] ?></p>
            <p class="col-4"><span class="fw-bold">type 1 : </span><?= $pokemon["type0"] ?></p>
            <p class="col-4"><span class="fw-bold">type 2 : </span><?= ($pokemon["type1"] == "") ? "None" : $pokemon["type1"] ?></p> 
        </div>
        <div class="row text-center">
            <p class="col-6"><span class="fw-bold">HP : </span><?= $pokemon["baseHP"] ?></p>        
            <p class="col-6"><span class="fw-bold">Spd : </span><?= $pokemon["baseSpeed"] ?></p>
        </div>
        <div class="row text-center">
            <p class="col-6"><span class="fw-bold">Atk : </span><?= $pokemon["baseAttack"] ?></p>
            <p class="col-6"><span class="fw-bold">Def : </span><?= $pokemon["baseDefense"] ?></p>
        </div>
        <div class="row text-center">
            <p class="col-6"><span class="fw-bold">Atk Sp : </span><?= $pokemon["baseSp_Attack"] ?></p>
            <p class="col-6"><span class="fw-bold">Def sp : </span><?= $pokemon["baseSp_Defense"] ?></p>
        </div>
    </section>
    <a href="index.php" class="btn btn-dark rounded-pill p-3">Go to Index</a>
</body>
</html>