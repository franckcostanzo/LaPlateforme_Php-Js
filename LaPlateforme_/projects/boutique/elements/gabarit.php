<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="Elements/CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Elements/CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="d-flex">
        <div id="logo">
            <img src="Elements/Media/lego.png">
        </div>

        
        <nav class="d-flex flex-row align-items-center justify-content-end" id="desktopNav">
            <div class="input-group">
                <form class="form-outline d-flex mx-3" action="#" method="POST">
                    <input type="search" id="form1" class="form-control rounded-pill menuTxt" placeholder="  search..."/>
                    <button type="submit" name="searchBar" class="rounded-pill"><img src="Elements/Media/search.png" class="rounded-pill" id="searchImg"></button>                  
                </form>                
            </div>
            <a href="index.php" class="mx-2 menuTxt">Home</a>
            <a href="shop.php" class="mx-2 menuTxt">Shop</a>
            <?php if (isset($_SESSION['rights']) && $_SESSION['rights'] == 1337) : ?>
                <a href="admin.php" class="mx-2 menuTxt">Admin</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['firstname'])) : ?>
                <a href="profil.php" class="mx-2 menuTxt">Profil</a>
                <form action="#" method="POST">
                    <button type="submit" name="deconnexion" class="ms-2 me-4 menuTxt text-center" id="decoBtn">Déconnexion
                    </button>
                </form>
            <?php else : ?>                   
                <a href="inscription.php" class="mx-2 menuTxt">Inscription</a>
                <a href="connexion.php" class="mx-2 menuTxt">Connexion</a>
            <?php endif ?>
            <div class="ms-2 me-4">
                <a href="#" class="btn btn-light mx-2 rounded-pill d-flex flew-row align-items-center">                    
                    <div class="menuTxt">0€</div> 
                    <i class="fa fa-shopping-cart mx-1 menuTxt" aria-hidden="true"></i>
                </a>
            </div>
        </nav>
        
        <nav class="d-flex flex-row align-items-center justify-content-end" id="scrollDownNav">
            <div class="input-group">
                <div class="form-outline d-flex mx-3">
                    <input type="search" id="form1" class="form-control rounded-pill" placeholder="search..."/>
                    <button type="submit" name="searchBar"><img src="Elements/Media/search.png" id="searchImg"></button>                  
                </div>                
            </div>
            <div class="btn-group dropstart" >
                <button type="button" class="btn btn-light dropdown-toggle rounded-pill mx-3" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu text-center">
                    <li><i class="fa fa-shopping-cart mx-1" aria-hidden="true">   0€ | 0</i></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <?php if (isset($_SESSION['rights']) && $_SESSION['rights'] == 1337) : ?>
                        <li><a href="admin.php">Admin Space</a></li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['firstname'])) : ?>
                        <li><a href="profil.php">Mon profil</a></li>
                        <li><form action="#" method="POST">
                                <button type="submit" name="deconnexion" class="ms-2 me-4 menuTxt" id="decoBtn">
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                        <?php else : ?>                  
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                    <?php endif ?>                
                </ul>
            </div>
        </nav>
        

    </header>
                    
    <?= $content ?>

    
</body>
</html>
    