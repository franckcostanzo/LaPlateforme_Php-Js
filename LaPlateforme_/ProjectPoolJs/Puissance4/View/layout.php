<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="View/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="View/CSS/bootstrap.min.css">    
    <script src="./Js/script.js"></script>
    <script src="./Js/overlayform.js"></script>
    <script src="./Js/displayGames.js"></script>
    <script src="./Js/multiplayer.js"></script>
    <title><?= $title ?></title>
</head>

<body>

    <header>
        <nav class="navbar bg-primary rounded-pill m-2 p-2">
            <!-- Navbar content -->
            <div class="container-fluid d-flex justify-content-center justify-content-lg-between">
                <h1 class="text-light mx-3"><a href="index.php" class="text-decoration-none text-reset">Connect 4</a></h1>
                <nav class="text-dark d-flex">
                    <?php if (isset($_SESSION['connected'])) : ?>
                        <a href="game.php" class="btn btn-light mx-2 p-2  rounded-pill">Game</a>
                        <a href="lobby.php" class="btn btn-light mx-2 p-2  rounded-pill">Game Lobby</a>
                        <form method="POST">
                            <button type="submit" name="deconnexion" class="btn btn-light mx-2 p-2  rounded-pill" id="decoBtn">Disconnect
                            </button>
                        </form>
                    <?php else : ?>                   
                        <a href="register.php" class="btn btn-light mx-2 p-2  rounded-pill">Register</a>
                        <a href="login.php" class="btn btn-light mx-2 p-2 rounded-pill">Log in</a>
                    <?php endif ?>
                </nav>
            </div>
        </nav>
    </header>
    
    <?php require_once('View/error.php')?>
    
    <main class="d-flex justify-content-center mt-2">
        <?= $content ?>
    </main>

</body>