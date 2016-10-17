<?php

class User {

    private $db;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function login($data) {

    }

    public function register($username, $password) {
        /*  When department is already created,
         *  Only change Password
         *  When department isn't created
         *  Make new row
         */
        
        // this->uniqueUser();
            // insert into database
        
            // update password of the selected row
    
    }

    public function logout() {
        if( isset($_SESSION))
        {
            session_destroy();
        }
        $this->redirect('index.php');
    }
    
    public function uniqueUser($userName) {
        $sql = "SELECT * FROM /*table*/ WHERE name = :userName";
        $stmt = $this->db->pdo->prepare($sql)
        ->bindParam(":userName", $userName)
        ->execute();
        
        $result = $stmt->rowCount();
    }
    
    public function redirect($path) {
        header('location: ' . BASE_URL . '/development/public/html/' . $path);
    }
    
    public function redirectMessage($path, $message) {
        header('location: ' . BASE_URL . '/development/public/html/' . $path . '?message=' . $message);
    }

}