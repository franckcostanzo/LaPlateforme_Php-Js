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


    public function checkExists($firstname, $lastname, $email, $password)
    {        
        $params = array($firstname, $lastname, $email, md5($password));

        $sql = "SELECT `firstname`, `lastname`,`email` FROM `users` 
                        WHERE `firstname` LIKE ? AND `lastname` LIKE ? AND `email` LIKE ? AND `password` LIKE ?";
                        
        $checkQuery = $this->executerRequete($sql,$params);

        return $checkQuery;
    }

    public function passwordChange($password, $firstname, $lastname, $newPassword)
    {
        $params = array(md5($newPassword), $firstname, $lastname, md5($password));

        $sql = "UPDATE `users` 
        SET `password` = ?                    
        WHERE `firstname` LIKE ? AND `lastname` LIKE ? AND `password` LIKE ?";

        $updateQuery = $this->executerRequete($sql, $params);

        return $updateQuery;
    }


}