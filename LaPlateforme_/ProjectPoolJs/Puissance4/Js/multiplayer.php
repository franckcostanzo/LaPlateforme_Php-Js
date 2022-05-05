<?php 
session_start();
include_once('C:\Program Files\xampp\htdocs\LaPlateforme_\ProjectPoolJs\Puissance4\Model\Game.php');

$game = Game::getGameByPlayerName($_SESSION['username']);

$gameJSON = json_encode($game);

echo $gameJSON;