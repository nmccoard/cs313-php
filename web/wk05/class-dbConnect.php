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


try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
/*
        try
        {
          $dbHost = "ec2-34-192-173-173.compute-1.amazonaws.com";
          $dbPort = "5432";
          $dbUser = "sdznzbgwrqvvvm";
          $dbPassword = "e90ffac7f5ceafe357dabc0718d039b63ebff029228ea47ee52a7fd71036b96d";
          $dbName = "d2jvq5vmukp9fa";
          $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->_connection = $db;
        }
        catch (PDOException $ex)
        {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }
*/
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