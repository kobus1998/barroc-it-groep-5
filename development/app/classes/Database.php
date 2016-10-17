<?php
define('DBHOST', 'localhost');
define('DBNAME', '');
define('DBUSER', 'root');
define('DBPASS', '');

class Database {

    private static $instance = null;

    public $pdo;

    private function __construct() {
        $this->pdo = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME ,DBUSER, DBPASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if ( is_null(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }



}
