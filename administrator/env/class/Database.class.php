<?php

class Database{

    private $_host      = 'localhost';
    private $_dbname    = 'oop_backoffice';
    private $_username  = 'root';
    private $_password  = '';
    private $_pdo;
    private static $_instance = null;

    private function __construct()
    {
        $this->_pdo = null;
        try
        {
            $this->_pdo = new PDO("mysql:host=".$this->_host.";dbname=".$this->_dbname.";charset=utf8", $this->_username, $this->_password);
            echo "<script>console.log('DB 👍')</script>"; 
        }
        catch(PDOException $e)
        {
            die("Connection failed: " . $e->getMessage());
        }

        return $this->_pdo;
    }

    public static function getInstance()
    {
        if(!self::$_instance)
        {
            self::$_instance =  new self();
        }
        return self::$_instance;
    }

    public function getDBConnection()
    {
        return $this->_pdo;
    }
}