<?php 

require_once 'Model/Model.php';

class User extends Model {

    public function register($firstname, $lastname,
                                        $password, $email, $phone, 
                                        $birthday, $address, $zipCode)
    { 
        $params = array($firstname, $lastname, md5($password), $email, $phone, $birthday, $address, $zipCode);

        $sql = 'INSERT INTO clients (client_id, firstname, lastname,' 
                                            .'password, email, phone, has_fidelity_bonus,'
                                            .'birthday, address, zip_code )' 
                .'VALUES (NULL, ?, ?,' 
                .'?, ?, ?, 0,'
                .'?, ?, ?)';

        $register = $this->executerRequete($sql, $params);

        return $register;
    }


    public function checkExists($firstname, $lastname, $email, $password)
    {        
        $params = array($firstname, $lastname, $email, md5($password));

        $sql = "SELECT `firstname`, `lastname`,`email` FROM `clients` 
                        WHERE `firstname` LIKE ? AND `lastname` LIKE ? AND `email` LIKE ? AND `password` LIKE ?";
                        
        $checkQuery = $this->executerRequete($sql,$params);

        return $checkQuery;
    }

    public function passwordChange($password, $firstname, $lastname, $newPassword)
    {
        $params = array(md5($newPassword), $firstname, $lastname, md5($password));

        $sql = "UPDATE `clients` 
        SET `password` = ?                    
        WHERE `firstname` LIKE ? AND `lastname` LIKE ? AND `password` LIKE ?";

        $updateQuery = $this->executerRequete($sql, $params);

        return $updateQuery;
    }


}