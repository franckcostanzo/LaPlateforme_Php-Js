<?php

require_once 'C:\Program Files\xampp\htdocs\LaPlateforme_\ProjectPoolJs\Puissance4\Model\Model.php';

Class Game extends Model
{  

    public static function createGame($gameName, $password, $gamer1)
    {
        $sql = "INSERT INTO games (game_name, password, gamer1) 
                        VALUES (?, ?, ?)";
        $params = array($gameName, $password, $gamer1);
        self::selectQuery($sql, $params);
    }

    public static function deleteGame($gameName, $password)
    {
        $sql = 'DELETE FROM games
                WHERE game_name LIKE ? AND password LIKE ?';

        $params = array($gameName, $password);
        self::selectQuery($sql, $params);
    }

    public static function getAllGames()
    {
        $sql = 'SELECT * FROM games';

        $gameQuery = self::selectQuery($sql);
        $infos = $gameQuery->fetchAll(PDO::FETCH_ASSOC);

        return $infos;
    }

    public static function getPasswordById($id)
    {
        $params = array($id);

        $sql = "SELECT password FROM games WHERE id_game LIKE ?";
        $passwordQuery = self::selectQuery($sql, $params);
        $infos = $passwordQuery->fetch(PDO::FETCH_ASSOC);

        return $infos;

    }

    public static function addPlayer($username, $gameId)
    {
        $params = array($username, $gameId);
        $sql = 'UPDATE games
                SET gamer2 = ?
                WHERE id_game = ?';
        self::selectQuery($sql, $params);
    }

    public static function getGameDetailsById($id)
    {
        $params = array($id);
        $sql = 'SELECT player_count, filled_boxes FROM games WHERE id_game like ?';
        $gameDetails = self::selectQuery($sql, $params);
        $infos = $gameDetails->fetch(PDO::FETCH_ASSOC);

        return $infos;
    }

    //a utiliser pour récupérer les détails relatifs aux cases et au tour du joueur
    public static function getGameByPlayerName($username)
    {
        $params = array($username, $username);
        $sql = 'SELECT * FROM games WHERE gamer1 Like ? OR gamer2 like ?';
        $selectGame = self::selectQuery($sql, $params);
        $infos = $selectGame->fetch(PDO::FETCH_ASSOC);

        return $infos;
    }

    //a utiliser pour mettre à jouer la bdd
    public static function updateGameDetailsById($id, $playerCount, $filledBoxes)
    {
        $params = array($playerCount, $filledBoxes, $id);
        $sql = 'UPDATE games
                SET player_count = ?, filled_boxes = ? 
                WHERE id_game like ?';
        $gameDetails = self::selectQuery($sql, $params);
        $infos = $gameDetails->fetch(PDO::FETCH_ASSOC);

        return $infos;
    }
    
    

}    