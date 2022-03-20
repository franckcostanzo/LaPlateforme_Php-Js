<?php

abstract class Model {

    private $bdd;
    
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé 
    private function getBdd() 
    {
        //version locale
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'boutique';

        //version pour plesk
        // $servername = 'localhost';
        // $username = 'franck-costanzo';
        // $password = 'Tisyoz84!!';
        // $db = 'franck-costanzo_boutique';

        try
        {
            $this->bdd = new PDO( "mysql:host=$servername;dbname=$db", $username, $password,
                            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
            return $this->bdd;
        }
        catch (PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage();
        }
        
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