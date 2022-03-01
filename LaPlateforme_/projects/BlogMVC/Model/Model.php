<?php

abstract class Model {

    private $bdd;
    
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé 
    protected function getBdd() 
    {
        //version locale
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'test';

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
    protected function requestExecute($sql, $params = null) 
    {
        if ($params == null) 
        {
            $result = $this->getBdd()->query($sql);    // exécution directe
        }
        else 
        {
            $result = $this->getBdd()->prepare($sql);  // requête préparée
            $result->execute($params);
        }
        return $result;
    }
    

}