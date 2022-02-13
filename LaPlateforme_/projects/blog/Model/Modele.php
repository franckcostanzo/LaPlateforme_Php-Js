<?php

abstract class Modele {

    private $bdd;
    
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé 
    private function getBdd() 
    {
        $this->bdd = new PDO( 'mysql:host=localhost;dbname=blog;charset=utf8', 
                            'root', '',
                            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
        return $this->bdd;
    } 

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null) 
    {
        if ($params == null) 
        {
            $resultat = $this->getBdd()->query($sql);    // exécution directe
        }
        else 
        {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }
    

}