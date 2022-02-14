<?php 

require_once 'Model/Model.php';

class User extends Model {

    public function register($firstname, $lastname,
                                        $password, $email, $phone, 
                                        $birthday, $address, $zipCode)
    { 
        $params = array($firstname, $lastname, $password, $email, $phone, $birthday, $address, $zipCode);

        $sql = 'INSERT INTO utilisateurs (client_id, firstname, lastname,' 
                                            .'password, email, phone, has_fidelity_bonus,'
                                            .'birthday, address, zip_code )' 
                .'VALUES (NULL, ?, ?,' 
                .'?, ?, ?, 0,'
                .'?, ?, ?)';

        $register = $this->executerRequete($sql, $params);

        return $register;
    }


    public function checkExists($firstname, $lastname, $email)
    {        
        $params = array($firstname, $lastname, $email);

        $sql = "SELECT `firstname`, `lastname`,`email` FROM `utilisateurs` 
                        WHERE `firstname` LIKE ? AND `lastname` LIKE ? AND `email` LIKE ?";
                        
        $checkQuery = $this->executerRequete($sql,$params);

        return $checkQuery->rowCount();
    }

}