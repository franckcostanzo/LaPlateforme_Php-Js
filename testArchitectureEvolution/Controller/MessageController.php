<?php

require_once 'Model/Message.php';

// initializing variables
$errors = array();
$message = new Message(); 

/*-------------------------------
          REGISTER USER 
--------------------------------*/

if (isset($_POST['reg_msg'])) 
{
  // receive all input values from the form
  $msg = htmlspecialchars($_POST['message']);

  // form validation
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($msg)) { array_push($errors, "Your message is empty"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
      $message->addMessage($msg, $_SESSION['id']);
  }
}