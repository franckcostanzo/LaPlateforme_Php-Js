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
  // // receive all input values from the form
  $password = htmlspecialchars($_POST['password']);
  $email = htmlspecialchars($_POST['email']);

  // form validation:
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  if (count($errors) == 0) 
  {
    // first check the database to make sure 
    // a user does already exist with the same username and email
    $selectQuery = $user->checkExists($email, $password);
    $row = $selectQuery->fetch();

    

    //check if user exists
    if ($selectQuery->rowCount() == 1) 
    { 
      session_start();    
      session_destroy();
      session_start();
      $userInfos = $user->getAllInfo($email, $password);
      $infoRows = $userInfos->fetch();      
      $_SESSION["connected"] = true;
      $_SESSION["rows"] = $infoRows;
      $_SESSION['firstname'] = $infoRows["firstname"];
      $_SESSION['lastname'] = $infoRows["lastname"];
      $_SESSION['email'] = $infoRows["email"];      
      $_SESSION['password'] = $password;
      $_SESSION['phone'] = $infoRows["phone"];
      $_SESSION['birthday'] = $infoRows["birthday"];
      $_SESSION['rights'] = $infoRows["right_id"];
      $_SESSION['address'] = $infoRows["address"];
      $_SESSION['zipCode'] = $infoRows["zip_code"];
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
        CHANGE USER INFO 
--------------------------------*/

if (isset($_POST['chg_infos'])) 
{
  // receive all input values from the form
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $birthday = htmlspecialchars($_POST['birthday']);
  $address = htmlspecialchars($_POST['address']);
  $zipCode = htmlspecialchars($_POST['zipCode']);

  // form validation
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "Lastname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Phone number is required"); }
  if (empty($birthday)) { array_push($errors, "Birthday is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($zipCode)) { array_push($errors, "ZipCode is required"); }

  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    $user->alterInfos($firstname, $lastname, 
                        $email, $phone, $birthday, 
                        $address, $zipCode);

    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['rights'] = $birthday;
    $_SESSION['address'] = $address;
    $_SESSION['zipCode'] = $zipCode;
  	$_SESSION['success'] = "You have now subscribed";
    $_SESSION['count'] = 0;
    header('location: ./index.php');
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
    $updateQuery =  $user->passwordChange($password_1, $_SESSION['email'], $oldPassword);
    $_SESSION['success'] = "You have changed your password";
    $_SESSION['count'] = 0;
    header('location: ./index.php');  
  }
}

/*-------------------------------
        DISCONNECT CHANGE 
--------------------------------*/
if (isset($_POST['deconnexion'])) 
{
  session_start();

  session_destroy();
  header('Location: ./index.php');
  exit;
}