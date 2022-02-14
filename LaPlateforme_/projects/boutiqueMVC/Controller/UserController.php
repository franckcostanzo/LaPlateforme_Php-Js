<?php

require_once('Model/User.php');
require_once('View/View.php');

class UserController 
{  
    private $user;

    public function __construct() 
    {
        $this->user = new User();
    }

    public function actionRegister()
    {
        if (isset($_POST['reg_user'])) 
        {
            $errors = array();

            // receive all input values from the form
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $password_1 = htmlspecialchars($_POST['password_1']);
            $password_2 = htmlspecialchars($_POST['password_2']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $birthday = htmlspecialchars($_POST['birthday']);
            $address = htmlspecialchars($_POST['adress']);
            $zipCode = htmlspecialchars($_POST['zipCode']);

            // form validation
            // by adding (array_push()) corresponding error unto $errors array
            if (empty($firstname)) { array_push($errors, "Firstname is required"); }
            if (empty($lastname)) { array_push($errors, "Lastname is required"); }
            if (empty($password_1)) { array_push($errors, "Password is required"); }
            if (empty($email)) { array_push($errors, "Email is required"); }
            if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }
            if (empty($phone)) { array_push($errors, "Phone number is required"); }
            if (empty($birthday)) { array_push($errors, "Birthday is required"); }
            if (empty($address)) { array_push($errors, "Address is required"); }
            if (empty($zipCode)) { array_push($errors, "ZipCode is required"); }

            //check if user exists
            $checkExists = $this->user->checkExists($firstname, $lastname, $email);        
            if ( $checkExists >= 1) {array_push($errors, "Username already exists"); }

            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) 
            {
                $this->user->register($firstname, $lastname,
                                        md5($password_1), $email, $phone, 
                                        $birthday, $address, $zipCode);
            }

        }

    }

}