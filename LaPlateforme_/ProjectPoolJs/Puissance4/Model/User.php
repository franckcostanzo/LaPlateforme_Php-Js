<?php

require_once 'Model/Model.php';

Class User extends Model
{
    

    public static function subscribeUser($username, $email, $password)
    {
        $sql = "INSERT INTO users (username, email, password) 
                        VALUES (?, ?, ?)";
        $params = array($username, $email, $password);
        self::selectQuery($sql, $params);
    }

    public static function chkExists($username)
    {
        $params = array($username);

        $sql = "SELECT * FROM `users` 
                        WHERE `username` LIKE ?";

        $checkQuery = self::selectQuery($sql,$params);
                
        $infos = $checkQuery->fetch(PDO::FETCH_ASSOC);

        $count = $checkQuery->rowCount();

        if ($count > 0)
        {
            return $infos;
        }
        else
        {
            return false;
        }
        
    }

    public static function getEmails()
    {
        $sql = "SELECT email FROM users";

        $emailQuery = self::selectQuery($sql);
        $infos = $emailQuery->fetchAll(PDO::FETCH_ASSOC);
        return $infos;
    }

    public static function getGamesPlayed($username)
    {
        $params = array($username);

        $sql = "SELECT games_played FROM users WHERE username LIKE ?";

        $gamesPlayedQuery = self::selectQuery($sql, $params);
        $infos = $gamesPlayedQuery->fetch(PDO::FETCH_ASSOC);
        return $infos;

    }

    public static function setGamesPlayed()
    {
        $sql = "UPDATE users
                SET games_played = games_played + 1";

        self::selectQuery($sql);
    }

    public static function getWin($username)
    {
        $params = array($username);

        $sql = "SELECT win FROM users WHERE username LIKE ?";

        $winQuery = self::selectQuery($sql, $params);
        $infos = $winQuery->fetch(PDO::FETCH_ASSOC);
        return $infos;

    }

    public static function setWin()
    {
        $sql = "UPDATE users
                SET win = win + 1";

       self::selectQuery($sql);

    }

    public static function getLoss($username)
    {
        $params = array($username);
        
        $sql = "SELECT loss FROM users WHERE username LIKE ?";

        $lossQuery = self::selectQuery($sql, $params);
        $infos = $lossQuery->fetch(PDO::FETCH_ASSOC);
        return $infos;

    }

    public static function setLoss()
    {
        $sql = "UPDATE users
                SET loss = loss + 1";

        self::selectQuery($sql);

    }

}

    