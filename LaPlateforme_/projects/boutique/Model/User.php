<?php 

require_once 'Model/Model.php';

class User extends Model {

    public function register($firstname, $lastname,
                                        $password, $email, $phone, 
                                        $birthday, $address, $zipCode)
    { 
        $params = array($firstname, $lastname, md5($password), $email, $phone, $birthday, $address, $zipCode);

        $sql = 'INSERT INTO users (id_user, firstname, lastname,' 
                                            .'password, email, phone, has_fidelity_bonus,'
                                            .'right_id, birthday, address, zip_code )' 
                .'VALUES (NULL, ?, ?,' 
                .'?, ?, ?, 0,'
                .'1, ?, ?, ?)';

        $register = $this->executerRequete($sql, $params);

        return $register;
    }


    public function checkExists($email, $password)
    {        
        $params = array($email, md5($password));

        $sql = "SELECT `firstname`, `lastname`,`email` FROM `users` 
                        WHERE `email` LIKE ? AND `password` LIKE ?";
                        
        $checkQuery = $this->executerRequete($sql,$params);

        return $checkQuery;
    }

    public function passwordChange($password, $email, $newPassword)
    {
        $params = array(md5($newPassword), $email, md5($password));

        $sql = "UPDATE `users` 
        SET `password` = ?                    
        WHERE `email` LIKE ? AND `password` LIKE ?";

        $updateQuery = $this->executerRequete($sql, $params);

        return $updateQuery;
    }

    public function alterInfos($firstname, $lastname, 
                                $email, $phone, $birthday, 
                                $address, $zipCode)
    {
        $params = array($firstname, $lastname, 
                            $email, $phone, $birthday, 
                            $address, $zipCode, $_SESSION['email'], md5($_SESSION['password']));

        $sql = "UPDATE `users` 
        SET `firstname` = ? , `lastname` = ?, 
        `email` = ?, `phone` = ?, `birthday` = ?,
        `address` = ?, `zip_code` = ?                  
        WHERE `email` LIKE ? AND `password` LIKE ?";

        $alterQuery = $this->executerRequete($sql, $params);

        return $alterQuery;
    }

    public function getAllInfo($email, $password)
    {
        $params = array($email, md5($password));

        $sql = "SELECT * FROM `users` 
                WHERE `email` LIKE ? AND `password` LIKE ?";
        
        $selectQuery = $this->executerRequete($sql, $params);
        
        return $selectQuery;
    }


}