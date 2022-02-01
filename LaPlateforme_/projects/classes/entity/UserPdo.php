<?php declare(strict_types=1);
include ('./service/DbconnectPDO.php');

class UserPdo 
{
    private int $id;
    public string $login;
    public string $email;
    public string $firstname;
    public string $lastname;  

    public function __construct()
    {
        /*Est appelé automatiquement lors de l’initialisation de
        votre objet. Initialise les différents attributs de votre
        objet.*/

    }

    /*Créée l’utilisateur en BDD. Retourne un tableau contenant
    l’ensembles des informations de ce même utilisateur.*/
    public function register(string $login, string $password, 
                            string $email, string $firstname, 
                            string $lastname)
    { 
        $pdo = DbconnectPDO::dbconnect();
        $selectQuery = $pdo->prepare("SELECT `login`,`email` FROM `users` 
                        WHERE `login` LIKE ? AND `email` LIKE ?");
        $selectQuery->execute(array(
            $login,
            $email
        ));

        //check if user exists
        if ( $selectQuery->rowCount() == 0)
        {            
            $ins = $pdo->prepare("INSERT INTO `users` (`id`, `login`, `password`, `email`, `firstname`, `lastname`)" 
            ."VALUES (NULL, ?, ?, ?, ?, ?);");
            $ins->execute(array(
                $login,                
                md5($password),
                $email,
                $firstname,
                $lastname
            ));
            echo "<br> <p>$login a été créé! <p>";
        } 
        else 
        {
            echo $login." existe déjà !";
        } 

    }

    /*connecte l’utilisateur, et donne aux attributs de la
    classe les valeurs correspondantes à celles de l’utilisateur
    connecté.*/
    public function connect(string $login, string $password)
    {
        $pdo = DbconnectPDO::dbconnect();
        $selectQuery = $pdo->prepare("SELECT * FROM `users` WHERE `login` LIKE ? AND `password` LIKE ?;");
        $selectQuery->execute(array(
            $login,
            md5($password)
        ));

        $row = $selectQuery->fetch();
        if ($selectQuery->rowCount() == 1) 
        {
            $this->id = intval($row["id"]);
            $this->login = $row["login"];
            $this->email = $row["email"];
            $this->firstname = $row["firstname"];
            $this->lastname = $row["lastname"];
            session_start();
            $_SESSION["connected"] = true;
            echo "<h1> Vous êtes connecté <h1><br>";
        }
        else 
        {
            echo "<h1> Wrong login/password combination<h1><br>";
        }
    }

    /*Déconnecte l’utilisateur */
    public function disconnect()
    {
        session_start();
        if ( $_SESSION["connected"] == true)
        {
            session_destroy();
            echo "<h1> Vous êtes déconnecté <h1><br>";
        }
        else
        {
            echo "Vous n'êtes pas connecté !";
        }
        
    }

    /*Supprime ET déconnecte un user */
    public function delete()
    {        
        $pdo = DbconnectPDO::dbconnect();
        session_start();
        if ( $_SESSION["connected"] == true)
        {
            $deleteQuery = $pdo->prepare("DELETE FROM `users` WHERE `login` LIKE ? AND `email` LIKE ?");
            $deleteQuery->execute( array(
                $this->login,
                $this->email
            ));
            echo "L'utilisateur $this->login avec l'email $this->email a été supprimé !";
            unset($this->id);
            unset($this->login);
            unset($this->email);            
            unset($this->firstname);
            unset($this->lastname);
            session_destroy();
        }
        else
        {
            echo "Vous n'êtes pas connecté !";
        }
    }

    /* Met à jour les attributs de l’objet, et modifie
    les informations en BDD */
    public function update(string $login, string $password, 
                            string $email, string $firstname, 
                            string $lastname)
    {       
        $pdo = DbconnectPDO::dbconnect();

        $queryReturn = $pdo->prepare("SELECT `login`,`email` FROM `users` 
                        WHERE `login` LIKE ? AND `email` LIKE ?");
        $queryReturn->execute(array(
            $login,
            $email
        ));

        //check if user exists
        if ( $queryReturn->rowCount() == 1)
        {            
            $updateQuery =  $pdo->prepare("UPDATE `users` 
                        SET `login` = ?, `password` = ?, `email` = ?, `firstname` = ?, `lastname`= ?                    
                        WHERE `login` LIKE ? AND `password` LIKE ?");
            $updateQuery->execute(array(
                $login,
                md5($password),
                $email,
                $firstname,
                $lastname,
                $login,
                md5($password)
            ));
        }
    }

    /*retourne un booleen permettant de savoir si un
    utilisateur est connecté ou non */
    public function isConnected()
    {       
        if(session_status() === PHP_SESSION_NONE)
        { session_start(); }
        
        return $_SESSION["connected"] ? true : false;
    }

    /*Retourne un tableau contenant l’ensemble des
    informations de l’utilisateur */
    public function getAllInfos()
    {
        
        echo "<table><tr>";
        foreach ($this as $key => $value) 
        {
            echo "<th>$key</th>";
        }
        echo "</tr><tr>";
        foreach ($this as $key => $value) 
        {
            echo "<td>$value</td>";
        }
        echo "</tr><table>";

    }

    /*retourne le login de l’utilisateur */
    public function getLogin()
    {
        
        return $this->login;
    }
    
    /*retourne l'email de l’utilisateur */
    public function getEmail()
    {
        return $this->email;
    }

    /*retourne le prenom de l’utilisateur */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /*retourne le nom de famille de l’utilisateur */
    public function getLastname()
    {
        return $this->lastname;
    }
}


?>