<?php

require_once 'Model/User.php';

// initializing variables
$_SESSION['errors'] = array();
$user = new User(); 

/*-------------------------------
          REGISTER USER 
--------------------------------*/

if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $login = htmlspecialchars($_POST['login']);
  $password_1 = htmlspecialchars($_POST['password_1']);
  $password_2 = htmlspecialchars($_POST['password_2']);

  // form validation
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($login)) { array_push($_SESSION['errors'], "Login is required"); }
  if (empty($password_1)) { array_push($_SESSION['errors'], "Password is required"); }
  if ($password_1 != $password_2) { array_push($_SESSION['errors'], "The two passwords do not match"); }

  //check if user exists
  $chkExists = $user->chkExists($login);
  
  if ( gettype($chkExists) == "array" ) {array_push($_SESSION['errors'], "User already exists"); }

  // Finally, register user if there are no errors in the form
  if ( count($_SESSION['errors']) == 0) 
  {
      $user->register($login, $password_1);
      header('location: ./connexion');
      
  }
}


/*-------------------------------
          LOGIN USER 
--------------------------------*/

if (isset($_POST['login_user'])) 
{
  // receive all input values from the form
  $password = htmlspecialchars($_POST['password']);
  $login = htmlspecialchars($_POST['login']);

  // form validation:
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($password)) { array_push($_SESSION['errors'], "Password is required"); }
  if (empty($login)) { array_push($_SESSION['errors'], "Login is required"); }

  // check the database to make sure 
  // a user does already exist with the same login and password
  $checkExists = $user->chkExists($login, $password);
  if ( !$checkExists ) {array_push($_SESSION['errors'], "Wrong login/password combination"); }
  

  if (count($_SESSION['errors']) == 0) 
  {    
    if ( password_verify($password, $checkExists['password']))
    {
      session_start();    
      session_destroy();
      session_start();
      $userInfos = $user->getAllInfs($login);
      $infoRows = $userInfos->fetch();
      $_SESSION['login'] = $infoRows["login"];
      $_SESSION['id'] = $infoRows["id_user"];
      header('location: ./home');
    }
    else
    {
      array_push($_SESSION['errors'], "Wrong login/password combination");
    }
      
  }
}


/*-------------------------------
        DISCONNECT CHANGE 
--------------------------------*/
if (isset($_POST['deconnexion'])) 
{
  session_start();

  session_destroy();
  header('Location: ./home');
  exit;
}