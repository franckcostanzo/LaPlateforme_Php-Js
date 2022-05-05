<?php

include_once ('Model/User.php');
$_SESSION['errors'] = array();

/*-------------------------------
             REGISTER 
--------------------------------*/

if(isset($_POST['submit_subscription']))
{

    // receive all input values from the form
    $username = htmlspecialchars($_POST['username']);
    $password_1 = htmlspecialchars($_POST['password_1']);
    $password_2 = htmlspecialchars($_POST['password_2']);
    $email = htmlspecialchars($_POST['email']);

    // form validation
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($_SESSION['errors'], "username is required"); }
    if (empty($password_1)) { array_push($_SESSION['errors'], "Password is required"); }
    if (empty($email)) { array_push($_SESSION['errors'], "Email is required"); }
    if (!preg_match('/^[a-z0-9._-]+[@]+[a-zA-Z0-9._-]+[.]+[a-z]{2,3}$/', $email)) { array_push($_SESSION['errors'], "Email format is wrong"); }
    if ($password_1 != $password_2) { array_push($_SESSION['errors'], "The two passwords do not match"); }
    if (!preg_match('/^[a-zA-Z0-9]{8,}$/', $password_1)) { array_push($_SESSION['errors'], "Password format is wrong");}

    //check if user exists
    $chkExists = User::chkExists($email);
    if ( gettype($chkExists) == "array" ) {array_push($_SESSION['errors'], "User already exists"); }

    // Finally, register user if there are no errors in the form
    if ( count($_SESSION['errors']) == 0) 
    {
        User::subscribeUser($username, $email, 
                                $password_1);
        header('location: ./login.php');        
    }
    
}

/*-------------------------------
               CONNECT 
--------------------------------*/

if( isset($_POST['submit_connection']))
{

    // receive all input values from the form
    $password = htmlspecialchars($_POST['password']);
    $username = htmlspecialchars($_POST['username']);

    // form validation:
    // by adding (array_push()) corresponding error unto $errors array
    if(empty($_POST['username'])){ array_push($_SESSION['errors'],'please insert your email'); }
    if(empty($_POST['password'])){ array_push($_SESSION['errors'],'please insert your password'); }

    // check the database to make sure 
    // a user does already exist with the same login and password
    $checkExists = User::chkExists($username);

    if ( !$checkExists ) {array_push($_SESSION['errors'], "Wrong login/password combination"); }

    if (count($_SESSION['errors']) == 0) 
    {    
        if ( $password == $checkExists['password'])
        {
        session_start();    
        session_destroy();
        session_start();
        
        $_SESSION['connected'] = true;
        $_SESSION['id'] = $checkExists["id_user"];
        $_SESSION['username'] = $checkExists["username"];
        $_SESSION['email'] = $checkExists["email"];
        $_SESSION['gamesPlayed'] = $checkExists["games_played"];
        $_SESSION['win'] = $checkExists["win"];
        $_SESSION['loss'] = $checkExists["loss"];

        header('location: ./index.php');
       
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
  header('Location: ./login.php');
  exit;

}

// test logic
// if (isset($_POST['updateGame']))
// {
//     User::setGamesPlayed();
//     User::setWin();
//     User::setLoss();
//     $tempGamesPlayed = User::getGamesPlayed($_SESSION['username']);
//     $_SESSION['gamesPlayed'] = $tempGamesPlayed['games_played'];
//     $tempWin = User::getWin($_SESSION['username']);
//     $_SESSION['win'] = $tempWin['win'];
//     $tempLoss = User::getLoss($_SESSION['username']);
//     $_SESSION['loss'] = $tempLoss['loss'];
// }