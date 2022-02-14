<?php

require_once 'Model/User.php';

// initializing variables
$username = "";
$errors = array();
$user = new User(); 

/*-------------------------------
          REGISTER USER 
--------------------------------*/

if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $password_1 = htmlspecialchars($_POST['password_1']);
  $password_2 = htmlspecialchars($_POST['password_2']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $birthday = htmlspecialchars($_POST['birthday']);
  $address = htmlspecialchars($_POST['address']);
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
  $checkExists = $user->checkExists($firstname, $lastname, $email, $password_1);        
  if ( $checkExists->rowCount() >= 1) {array_push($errors, "Username already exists"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
      $user->register($firstname, $lastname, 
                              $password_1, $email, $phone, 
                              $birthday, $address, $zipCode);
  	$_SESSION['success'] = "You have now subscribed";
    $_SESSION['count'] = 0;
    header('location: ./connexion.php');
  }
}


/*-------------------------------
          LOGIN USER 
--------------------------------*/

if (isset($_POST['login_user'])) 
{
  // receive all input values from the form
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $password = htmlspecialchars($_POST['password']);
  $email = htmlspecialchars($_POST['email']);

  // form validation:
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "firstname is required"); }
  if (empty($lastname)) { array_push($errors, "lastname is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  if (count($errors) == 0) 
  {
    // first check the database to make sure 
    // a user does already exist with the same username and email
    $selectQuery = $user->checkExists($firstname, $lastname, $email, $password);
    $row = $selectQuery->fetch();

    //check if user exists
    if ($selectQuery->rowCount() == 1) 
    { 
      session_start();    
      session_destroy();
      session_start();
      $_SESSION["connected"] = true;
      $_SESSION['firstname'] = $row["firstname"];
      $_SESSION['lastname'] = $row["lastname"];
      $_SESSION['email'] = $row["email"];
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['count'] = 0;
      header('location: ./index.php'); 
    }
    else 
    {
      array_push($errors, "Wrong username/password combination");
    }
  }
}


/*-------------------------------
          PASSWORD CHANGE 
--------------------------------*/

if (isset($_POST['pwd_chg'])) 
{
  // receive all input values from the form
  $oldPassword = htmlspecialchars($_POST['oldPassword']);
  $password_1 = htmlspecialchars($_POST['new_password_1']);
  $password_2 = htmlspecialchars($_POST['new_password_2']);
  
  // form validation:
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($oldPassword)) { array_push($errors, "Old password is required"); }
  if (empty($password_1)) { array_push($errors, "New password is required"); }
  if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

  if (count($errors) == 0) 
  {
    $updateQuery =  $user->passwordChange($password_1, $_SESSION['firstname'], 
                                                $_SESSION['lastname'], $oldPassword);
    $_SESSION['success'] = "You have changed your password";
    $_SESSION['count'] = 0;
    header('location: ./index.php');  
  }
}

?>