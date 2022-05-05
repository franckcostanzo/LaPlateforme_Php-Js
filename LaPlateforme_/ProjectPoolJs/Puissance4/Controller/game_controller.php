<?php

include_once ('Model/Game.php');
$_SESSION['errors'] = array();

/*-------------------------------
             REGISTER 
--------------------------------*/

if(isset($_POST['gameCreate']))
{

    // receive all input values from the form
    $gameName = htmlspecialchars($_POST['gameName']);
    $password = htmlspecialchars($_POST['gamePassword']);

    // form validation
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($gameName)) { array_push($_SESSION['errors'], "A name is required, game was not created"); }

    // Finally, createGame
    if ( count($_SESSION['errors']) == 0) 
    {
        Game::createGame($gameName, $password, $_SESSION['username']);
        header('location: ./game.php'); 
    }
    
}

/*-------------------------------
             JOIN 
--------------------------------*/
if(isset($_POST['gameAccess']))
{
    $gameId = $_POST['id'];
    $creatorName = $_POST['creator'];
    $password = htmlspecialchars($_POST['gamePassword']);
    $passwordVerif = Game::getPasswordById($gameId);
    
    if($password != $passwordVerif["password"]) {  array_push($_SESSION['errors'], "incorrect password"); }
    if($creatorName == $_SESSION['username']) {  array_push($_SESSION['errors'], "you already are in this game"); }

    // Finally, joinGame
    if ( count($_SESSION['errors']) == 0) 
    {
        Game::addPlayer($_SESSION['username'], $gameId);
        //TODO JOIN EXISTING GAME LOGIC
        header('location: ./game.php'); 
    }
}