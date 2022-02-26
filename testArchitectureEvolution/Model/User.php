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

    public function loginExists($login)
    {
        $params = array($login);

        $sql = "SELECT `login`,`password` FROM `users` 
                        WHERE `login` LIKE ?";

        $checkQuery = $this->requestExecute($sql,$params)->fetch(PDO::FETCH_ASSOC);
        
        return $checkQuery;
    }
    
    public function chkExists($login, $password)
    {
        $params = array($login);

        $sql = "SELECT * FROM `users` 
                        WHERE `login` LIKE ?";

        $checkQuery = $this->requestExecute($sql,$params);
        
        $infos = $checkQuery->fetch(PDO::FETCH_ASSOC);

        if (isset($infos['password']) && password_verify($password, $infos['password']))
        {
            return $infos;
        }
        else 
        {
            return array();
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