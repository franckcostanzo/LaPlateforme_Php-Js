<?php 

include_once('C:\Program Files\xampp\htdocs\LaPlateforme_\ProjectPoolJs\Puissance4\Model\Game.php');

$games = Game::getAllGames();

$gamesJSON = json_encode($games);

echo $gamesJSON;