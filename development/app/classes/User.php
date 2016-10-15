<?php

class User {

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }



    public function redirect($path) {
        header('location: ' . BASE_URL . '/development/public/html/' . $path);
    }

}