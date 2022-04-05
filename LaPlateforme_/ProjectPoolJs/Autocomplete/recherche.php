<?php session_start(); require_once('./Controller/searchController.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Css/style.css">
    <link rel="stylesheet" type="text/css" href="./Css/bootstrap.min.css">
    <script src="./script.js"></script>
    <title>Recherche</title>
</head>
<body class="d-flex flex-column justify-content-center align-items-center w-100">

<section class="m-5 w-75">
    <?php if ((isset($_SESSION["pokemons"])) && (isset($_SESSION["pokemons"][0]))) : ?>
        <table class="table">
            <thead>
                <th>id</th>
                <th>nom</th>
                <th>type 1</th>
                <th>type 2</th>
                <th>HP</th>
                <th>Atk</th>
                <th>Def</th>
                <th>Atk Sp</th>
                <th>Def sp</th>
                <th>Spd</th>
            </thead>
            <tbody>
            <?php foreach($_SESSION['pokemons'] as $pokemon) : ?>
                
                    <tr id="pokemon#<?= $pokemon["id"] ?>" >
                                        
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["id"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["nom"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["type0"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["type1"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["baseHP"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["baseAttack"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["baseDefense"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["baseSp_Attack"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["baseSp_Defense"] ?>
                            </a>
                        </td>
                        <td>
                            <a href="element.php?id=<?= $pokemon["id"] ?>" 
                            class="text-decoration-none text-reset"> 
                                <?= $pokemon["baseSpeed"] ?>
                            </a>
                        </td>
                    </tr>
                
            <?php endforeach ?>
            </tbody>
        </table>
    <?php else :?>
        <h3 class="text-center">No result !</h3>
    <?php endif ?>
</section>
<a href="index.php" class="btn btn-dark rounded-pill p-3">Go to Index</a>


    
</body>
</html>