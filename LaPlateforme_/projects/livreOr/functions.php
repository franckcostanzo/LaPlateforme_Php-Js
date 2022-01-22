<?php
session_start();

// initializing variables
$username = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'franck-costanzo', 'Tisyoz84!!', 'franck-costanzo_livreor');

// REGISTER USER
if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) 
  {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM utilisateurs WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) // if user exists
  { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
  	$password = md5($password_1);   //encrypt the password before saving in the database

  	$query = "INSERT INTO utilisateurs (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You have now subscribed";
    $_SESSION['count'] = 0;
    header('location: ./index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) 
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) 
    {
        array_push($errors, "Username is required");
    }
    if (empty($password)) 
    {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) 
    {
        $password = md5($password);
        $query = "SELECT * FROM utilisateurs WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) 
        {
            $_SESSION['username'] = $username;
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

// PASSWORD CHANGE
if (isset($_POST['pwd_chg'])) 
{
    // receive all input values from the form
  $oldPassword = mysqli_real_escape_string($db, $_POST['oldPassword']);
  $password_1 = mysqli_real_escape_string($db, $_POST['new_password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['new_password_2']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($oldPassword)) { array_push($errors, "Old password is required"); }
    if (empty($password_1)) { array_push($errors, "New password is required"); }
    if ($password_1 != $password_2) 
    {
        array_push($errors, "The two passwords do not match");
    }

    if (count($errors) == 0) 
    {
        $password = md5($password_1);   //encrypt the password before saving in the database
        $tempUser = $_SESSION["username"];
        $query = "INSERT INTO utilisateurs (username, password) 
                VALUES('$tempUser', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You have changed your password";
        $_SESSION['count'] = 0;
        header('location: ./index.php');   
    }
}




// REGISTER MESSAGE  ---- NOT WORKING ----
if (isset($_POST['reg_msg'])) 
{
    // $userIdQuery = 'SELECT id FROM `utilisateurs` WHERE `username` = `$_SESSION["username"]`';
    $userForQuery = $_SESSION["username"];
    $query = "SELECT * FROM utilisateurs WHERE username='$userForQuery'";
    $resultId = mysqli_fetch_assoc(mysqli_query($db, $query));
    $userId = $resultId["id"];
    $message = mysqli_real_escape_string($db, $_POST['message']);
    $current_date = date("Y-m-d H:i:s");
    $query = "INSERT INTO `commentaires` (`id`,`commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '$message', '$userId', '$current_date');";
    try { mysqli_query($db, $query);} catch (mysqli_sql_exception $e) { 
        echo '<pre>',var_dump($e),'</pre>';
        exit; 
     } 
}

?>