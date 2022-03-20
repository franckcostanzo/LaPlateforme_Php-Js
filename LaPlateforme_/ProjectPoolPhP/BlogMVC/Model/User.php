<?php 

require_once 'Model/Model.php';

class User extends Model 
{

    public function __construct() {}


    public function register($login, $password)
    { 
        $params = array($login, password_hash($password, PASSWORD_DEFAULT));

        $sql = 'INSERT INTO users (id_user, login, password)
                VALUES (NULL, ?, ?)';

        $register = $this->requestExecute($sql, $params);

        return $register;
    }

    
    public function chkExists($login)
    {
        $params = array($login);

        $sql = "SELECT * FROM `users` 
                        WHERE `login` LIKE ?";

        $checkQuery = $this->requestExecute($sql,$params);
                
        $infos = $checkQuery->fetch(PDO::FETCH_ASSOC);

        $count = $checkQuery->rowCount();

        if ($count > 0)
        {
            return $infos;
        }
        else
        {
            return false;
        }
        
    }


    public function getAllInfs($login)
    {
        $params = array($login);

        $sql = "SELECT * FROM `users` WHERE `login` = ?";
        
        $selectQuery = $this->requestExecute($sql, $params);
        
        return $selectQuery;
    }

    

}