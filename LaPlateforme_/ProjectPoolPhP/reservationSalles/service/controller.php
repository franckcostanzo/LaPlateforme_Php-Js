<?php
include ('DbconnectPDO.php');

class ReservationDate
{    
  private $debut;
  private $fin;

  public function __set($name, $value) {}

  public function getDebut()
  {
      return $this->debut;
  }

  public function getFin()
  {
      return $this->fin;
  }
}

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

  // form validation
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $selectQuery = $pdo->prepare("SELECT `username`,`password` FROM `utilisateurs` 
                  WHERE `username` LIKE ? AND `password` LIKE ?");
  $selectQuery->execute(array(
      $username,
      md5($password_1)
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
  	$ins = $pdo->prepare("INSERT INTO `utilisateurs` (`id`, `username`, `password`)" 
            ."VALUES (NULL, ?, ?);");
            $ins->execute(array(
                $username,                
                md5($password_1)
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

  // form validation:
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  if (count($errors) == 0) 
  {
    // first check the database to make sure 
    // a user does already exist with the same username and email
    $selectQuery = $pdo->prepare("SELECT * FROM `utilisateurs` 
                                  WHERE `username` LIKE ? AND `password` LIKE ?");
    $selectQuery->execute(array(
        $username,
        md5($password)
    ));
    $row = $selectQuery->fetch();

    //check if user exists
    if ($selectQuery->rowCount() == 1) 
    { 
      session_start();
      $_SESSION["connected"] = true;
      $_SESSION['username'] = $row["username"];
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


/*-------------------------------
       REGISTER RESERVATION  
--------------------------------*/
if (isset($_POST['resaForm'])) 
{
  if(session_status() !== PHP_SESSION_ACTIVE) session_start();
  // receive all input values from the form
  $titre = htmlspecialchars($_POST['titre']);
  $heureDebut = $_POST['heureDebut'];
  $heureFin = $_POST['heureFin'];
  $date = $_POST['date'];
  $dateDebut = $date.' '.$heureDebut.':00:00';
  $dateFin = $date.' '.$heureFin.':00:00';
  $date = new DateTime($date);
  $day =  $date->format("w");  
  $description = htmlspecialchars($_POST['description']);
  $username = $_SESSION['username'];

  //get id from session username
  $selectQuery = $pdo->prepare("SELECT `id` FROM `utilisateurs` 
                                  WHERE `username` LIKE ?");
  $selectQuery->execute(array($username));
  $id = $selectQuery->fetch();

  // form validation
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($titre)) { array_push($errors, "Veuillez renseigner un titre"); }
  if (empty($heureDebut)) { array_push($errors, "Veuillez renseigner une heure de début de réservation"); }
  if (empty($heureFin)) { array_push($errors, "Veuillez renseigner une heure de fin de réservation"); }
  if ($heureDebut == $heureFin) { array_push($errors, "L'heure de fin est la même que celle de début !"); }
  if ($heureDebut > $heureFin) { array_push($errors, "L'heure de fin ne peut pas être avant celle de début !"); }
  if (empty($date)) { array_push($errors, "Veuillez renseigner une date de réservation"); }
  if (empty($description)) { array_push($errors, "Veuillez renseigner une description"); }
  if($day == 6 || $day == 0) { array_push($errors, "Pas de réservation le week-end"); }

  // first check the database to make sure 
  // a reservation does not already exist with the same date and hour
  $checkQuery = $pdo->prepare("SELECT `debut`,`fin` FROM `reservations` 
                  WHERE `debut` LIKE ? AND `fin` LIKE ?");
  $checkQuery->execute(array(
    $_POST['date']."%",
    $_POST['date']."%"
  ));

  //converting every items to reservation class
  $reservations = $checkQuery->fetchAll(PDO::FETCH_CLASS, 'reservationDate');
  
  //counting how many items received from query
  $rowCount = $checkQuery->rowCount();

  echo $rowCount."<br>";
 
  
  if ( $rowCount >= 1)
  {
      

      for($x=0;$x<$rowCount;$x++)
      {
        $_SESSION['resa'.$x] = $reservations[$x];
        $tempDate = new DateTime($_SESSION['resa'.$x]->getDebut()); 
        $tempHeureDebut = $tempDate->format("H");
        $tempDate = new DateTime($_SESSION['resa'.$x]->getFin());
        $tempHeureFin = $tempDate->format("H");

        if ((($tempHeureDebut <= $_POST['heureDebut']) && ($_POST['heureDebut'] < $tempHeureFin)) 
            || (($tempHeureDebut < $_POST['heureFin']) && ($_POST['heureFin'] <= $tempHeureFin)))
        {
          array_push($errors, 
          "Une réservation est déjà en cours pour ce créneau, veuillez vérifier le planning");
        }

      }
        

  }

  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    echo "JE SUIS DEDANS !";
  	$ins = $pdo->prepare("INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`,`fin`, `id_utilisateur`)" 
            ."VALUES (NULL, ?, ?, ?, ?, ?);");
            $ins->execute(array(
                $titre,                
                $description,
                $dateDebut,
                $dateFin,
                $id[0]
            ));
  	$_SESSION['success'] = "Votre réservation a été faites";
    $_SESSION['count'] = 0;
    header('location: ./index.php');
  }
}

?>