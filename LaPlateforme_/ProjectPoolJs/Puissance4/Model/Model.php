<?php

abstract Class Model {

    private static $conn;

    private static function getConn()
    {
        $server="localhost";
        $username="root";
        $password="";
        $database="connect4";

        $dsn = "mysql:host=$server;dbname=$database;charset=UTF8";
        self::$conn = new PDO($dsn, $username, $password);
        return self::$conn;
    }

    public static function selectQuery($sql,$params=null)
    {
        if($params===null)
        {
            $result = self::getConn()->query($sql);
        } 
        else 
        {
            $result = self::getConn()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }
}
