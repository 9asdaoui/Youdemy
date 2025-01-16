<?php
require_once __DIR__."/../temp/query.php";

class Database
{
    private static $conn;

    public static function getConnection()
    {
        if (self::$conn) {
            return self::$conn;
        }

        global $host, $db_name, $username, $password;

            self::$conn = new \PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
            return self::$conn;
      
    }
}