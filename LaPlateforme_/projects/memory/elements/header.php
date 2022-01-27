<header>
    <nav class="navbar bg-success rounded-pill m-2">
        <!-- Navbar content -->
        <div class="container-fluid">
            <h1 class="text-light"><a href="index.php">Memory</a></h1>
            <a href="https://github.com/franckcostanzo/cours-php/tree/main/LaPlateforme_/projects/memory">
                <i class="fab fa-github-square h1 text-light"></i>
            </a> 
            <nav class="text-dark d-flex" id="undisp">
                <a href="index.php" class="btn btn-light mx-2 rounded-pill">Home</a>
                <?php
                if (isset($_SESSION['username']))
                {
                    ?>
                <a href="profil.php" class="btn btn-light mx-2 rounded-pill">Mon profil</a>
                <a href="deconnexion.php" class="btn btn-light mx-2 rounded-pill">Déconnexion</a>
                <?php
                }
                else
                {
                ?>                  
                <a href="inscription.php" class="btn btn-light mx-2 rounded-pill">Inscription</a>
                <a href="connexion.php" class="btn btn-light mx-2 rounded-pill">Connexion</a>
                <?php
                }
                ?>
            </nav>
            
            <div class="btn-group dropstart" id="disp">
            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
                <ul class="dropdown-menu text-center">
                    <li><a href="index.php">Home</a></li>
                    <?php
                        if (isset($_SESSION['username']))
                        {
                        ?>
                        <li><a href="profil.php">Mon profil</a></li>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                        <?php
                        }
                        else
                        {
                        ?>                  
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                        <?php
                        }
                    ?>                
                </ul>
            </div>
        </div>
    </nav>
</header>