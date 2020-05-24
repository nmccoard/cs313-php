<?php

class Database {

    /**
     * Instance of the DB
     */
    private static $_instance = null;

    /**
     * Store the PDO instance
     */
    private $_connection = false;

    private function __construct() {

        $uri = getenv('DATABASE_URL');
/*
        try
        {
          $dbUrl = getenv('DATABASE_URL');
        
          $dbOpts = parse_url($dbUrl);
        
          $dbHost = $dbOpts["host"];
          $dbPort = $dbOpts["port"];
          $dbUser = $dbOpts["user"];
          $dbPassword = $dbOpts["pass"];
          $dbName = ltrim($dbOpts["path"],'/');
        
          $db = new PDO("pgsql:host=$dbHost;port=$dbPort;       dbname=$dbName", $dbUser, $dbPassword);
        
          $db->setAttribute(PDO::ATTR_ERRMODE,      PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex)
        {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }
*/
        try
        {
          $dbHost = "ec2-35-174-127-63.compute-1.amazonaws.com";
          $dbPort = "5432";
          $dbUser = "cmrgmptminhjzd";
          $dbPassword = "94f8b37f16591d4d13ccafbd7d6119c1c5b90dfb6eb4daf8bde793e1f81ff588";
          $dbName = "d1kk122i2rof6f";
          $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->_connection = $db;
        }
        catch (PDOException $ex)
        {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }

    }

    /**
     * Retrieve instance of the Database class
     *
     * @return Database|null
     */
    public static function getInstance() {

        if (self::$_instance == null) {
            self::$_instance = new Database();
        }

        return self::$_instance;
    }

    public function connection() {
        return $this->_connection;
    }

}