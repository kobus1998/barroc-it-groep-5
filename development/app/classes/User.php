<?php

class User {

    private $db;
    public $username;
    public $user_id;
        
    
    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function login($info)
    {
        $_SESSION['user_id'] = $info['user_id'];
        $_SESSION['username'] = $info['username'];
        
        $this->redirect('../../app/router.php');
    }

    public function register($username, $password)
    {
        /*  When department is already created,
         *  Only change Password
         *  When department isn't created
         *  Make new row
         */

        $sql = "SELECT * FROM `tbl_users` WHERE :username = `username`";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $data = $stmt->rowCount();

        if($data > 0)
        {
            $sql = "UPDATE `tbl_users` SET `password` = :password Where :username = `username`";
        } else {
            $sql = "INSERT INTO `tbl_users` (`username`, `password`) VALUES (:username, :password)";
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
    
    public function redirect($path) 
    {
        header('location: ' . BASE_URL . '/development/public/html/' . $path);
    }
    
    public function redirectMessage($path, $message) 
    {
        header('location: ' . BASE_URL . '/development/public/html/' . $path . '?message=' . $message);
    }

    
    public function setUser_ID($user_ID)
    {
        $this->user_id = $user_ID;
    }
    
    public function getUser_ID()
    {
        return $this->user_id;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
}