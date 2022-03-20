<header>
    <nav class="navbar bg-dark w-100">
        <!-- Navbar content -->
        <div class="container-fluid">
            <h1 class="text-light">Livre d'or</h1>
            <nav class="text-light d-flex" id="undisp">
                <a href="index.php" class="btn btn-secondary mx-2 rounded-pill">Home</a>
                <a href="livreOr.php" class="btn btn-secondary mx-2 rounded-pill">livre d'or</a>
                <?php
                if (isset($_SESSION['username']))
                {
                    ?>
                <a href="profil.php" class="btn btn-secondary mx-2 rounded-pill">Mon profil</a>
                <a href="deconnexion.php" class="btn btn-secondary mx-2 rounded-pill">Déconnexion</a>
                <?php
                }
                else
                {
                ?>                  
                <a href="inscription.php" class="btn btn-secondary mx-2 rounded-pill">Inscription</a>
                <a href="connexion.php" class="btn btn-secondary mx-2 rounded-pill">Connexion</a>
                <?php
                }
                ?>
            </nav>
            
            <div class="btn-group dropstart" id="disp">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a href="index.php">Home</a></li>
                    <li><a href="livreOr.php">livre d'or</a></li>
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