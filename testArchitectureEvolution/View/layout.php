<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="View/CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="View/CSS/style.css">
</head>
<body>

    <header>
        <nav class="navbar bg-success rounded-pill m-2">
            <!-- Navbar content -->
            <div class="container-fluid">
                <h1 class="text-light"><a href="home">Test</a></h1>
               
                <nav class="text-dark d-flex">
                    <a href="home" class="btn btn-light mx-2 rounded-pill">Home</a>
                    <a href="messages" class="btn btn-light mx-2 rounded-pill">Messages</a>
                    <?php if (isset($_SESSION['login'])) : ?>
                        <form action="#" method="POST">
                            <button type="submit" name="deconnexion" class="btn btn-light mx-2 rounded-pill">Déconnexion
                            </button>
                        </form>
                    <?php else : ?>                   
                        <a href="inscription" class="btn btn-light mx-2 rounded-pill">Inscription</a>
                        <a href="connexion" class="btn btn-light mx-2 rounded-pill">Connexion</a>
                    <?php endif ?>
                </nav>
  
            </div>
        </nav>
    </header>

    <?= $content ?>
    
</body>
</html>