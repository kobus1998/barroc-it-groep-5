<?php

class User {

    private $db;
    public $username;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function login($data) 
    {

    }

    public function register($username, $password) 
    {
        /*  When department is already created,
         *  Only change Password
         *  When department isn't created
         *  Make new row
         */

        if($this->uniqueUser($username) == 0)
        {
            $sql = "INSERT INTO /*`table`*/ (`username`, `password`) VALUES (:username, :password)";
        } else {
            $sql = "UPDATE /*`table`*/ SET `username` = :username, `password` = :password";
        }
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        
    
    }

    public function logout() 
    {
        if( isset($_SESSION))
        {
            session_destroy();
        }
        $this->redirect('index.php');
    }
    
    public function uniqueUser($username) 
    {
        $sql = "SELECT * FROM /*table*/ WHERE name = :username";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $stmt->rowCount();
    }
    
    public function redirect($path) 
    {
        header('location: ' . BASE_URL . '/development/public/html/' . $path);
    }
    
    public function redirectMessage($path, $message) 
    {
        header('location: ' . BASE_URL . '/development/public/html/' . $path . '?message=' . $message);
    }

}