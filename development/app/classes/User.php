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
        
        // select all with username, count rows
        $this->db->pdo->
            query("")->
            fetchAll(PDO::FETCH_ASSOC);

        $rows = '';
        if($rows < 1 ) {
            // insert into database

            $this->db->pdo->
                query("")->
                execute();

        } else {
            // update password of the selected row

            $this->db->pdo->
                query("")->
                execute();
        }
    }

    public function logout() {
        if( isset($_SESSION))
        {
            session_destroy();
        }
        $this->redirect('index.php');
    }

    public function redirect($path) {
        header('location: ' . BASE_URL . '/development/public/html/' . $path);
    }
    
    public function redirectMessage($path, $message) {
        header('location: ' . BASE_URL . '/development/public/html/' . $path . '?message=' . $message);
    }

}