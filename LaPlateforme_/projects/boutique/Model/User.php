<?php 

class User {

    public static function register($firstname, $lastname,
                                        $password, $email, $phone, 
                                        $birthday, $address, $zipCode)
    {
        //connect to the DB        
        $pdo = DbconnectPDO::dbconnect();

        /*SQL statement to be executed : 
        ? are values that are not directly inputed to avoid SQL injections
        NULL is for id that is auto incremented
        0 is for boolean value of has_fidelity_bonus table field, default has not
        */
        $sql = 'INSERT INTO utilisateurs (client_id, firstname, lastname, 
                                            password, email, phone, has_fidelity_bonus,
                                            birthday, address, zip_code ) 
                VALUES (NULL, :firstname, :lastname, 
                                :password, :email, :phone, 0,
                                :birthday, :address, :zip_code)';

        $ins = $pdo->prepare($sql);
        $ins->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $ins->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $ins->bindParam(':password', $password, PDO::PARAM_STR);
        $ins->bindParam(':email', $email, PDO::PARAM_STR);
        $ins->bindParam(':phone', $phone, PDO::PARAM_STR);
        $ins->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $ins->bindParam(':address', $address, PDO::PARAM_STR);
        $ins->bindParam(':zip_code', $zipCode, PDO::PARAM_STR);
        
        return $ins->execute();
    }


    public static function checkExists($firstname, $lastname, $email)
    {
        //connect to the DB        
        $pdo = DbconnectPDO::dbconnect();

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $checkQuery = $pdo->prepare("SELECT `firstname`, `lastname`,`email` FROM `utilisateurs` 
                        WHERE `firstname` LIKE ? AND `lastname` LIKE ? AND `email` LIKE ?");
        $checkQuery->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $checkQuery->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $checkQuery->bindParam(':email', $email, PDO::PARAM_STR);

        return $checkQuery->rowCount();
    }

}