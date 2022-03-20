<?php
include ('DbconnectPDO.php');

// initializing variables
$username = "";
$errors = array(); 

// connect to the database
$pdo = DbconnectPDO::dbconnect();


/*-------------------------------
          REGISTER USER 
--------------------------------*/

if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $username = htmlspecialchars($_POST['username']);
  $password_1 = htmlspecialchars($_POST['password_1']);
  $password_2 = htmlspecialchars($_POST['password_2']);
  $email = htmlspecialchars($_POST['email']);

  // form validation
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $selectQuery = $pdo->prepare("SELECT `username`,`email` FROM `utilisateurs` 
                  WHERE `username` LIKE ? AND `email` LIKE ?");
  $selectQuery->execute(array(
      $username,
      $email
  ));

  //check if user exists
  if ( $selectQuery->rowCount() == 1)
  {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
  	$ins = $pdo->prepare("INSERT INTO `utilisateurs` (`id`, `username`, `password`, `email`,`score`)" 
            ."VALUES (NULL, ?, ?, ?, ?);");
            $ins->execute(array(
                $username,                
                md5($password_1),
                $email,
                0
            ));
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
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $email = htmlspecialchars($_POST['email']);

  // form validation:
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  if (count($errors) == 0) 
  {
    // first check the database to make sure 
    // a user does already exist with the same username and email
    $selectQuery = $pdo->prepare("SELECT * FROM `utilisateurs` 
                                  WHERE `username` LIKE ? AND `password` LIKE ? AND `email` LIKE ?;");
    $selectQuery->execute(array(
        $username,
        md5($password),
        $email
    ));
    $row = $selectQuery->fetch();

    //check if user exists
    if ($selectQuery->rowCount() == 1) 
    { 
      session_start();    
      session_destroy();
      session_start();
      $_SESSION["connected"] = true;
      $_SESSION['username'] = $row["username"];
      $_SESSION['email'] = $row["email"];
      $_SESSION['score'] = $row["score"];
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
    $updateQuery =  $pdo->prepare("UPDATE `utilisateurs` 
                    SET `password` = ?                    
                    WHERE `username` LIKE ? AND `password` LIKE ?");
    $updateQuery->execute(array(        
        md5($password_1),
        $_SESSION['username'],
        md5($oldPassword)
    ));

    $_SESSION['success'] = "You have changed your password";
    $_SESSION['count'] = 0;
    header('location: ./index.php');  
  }
}

?>