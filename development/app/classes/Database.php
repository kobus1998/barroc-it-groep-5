<?php


class Database
{

    private static $instance = null;

    //db pdo methode
    public $pdo;

    // database connection dbname= " " is name of database
    private function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=db_barroc_it",'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    // makes sure database doesn't get used multiple times
    public static function getInstance() {
        if ( is_null(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

}