<?php


class User
{
    // all variables on public
    public $role;
    
    // constructor
    public function __construct()
    {
        
    }
    
    // all functions down here

    //logout function
    public function logout() {
        if (isset($_SESSION)) {

            session_destroy();

        }

        $this->redirect('index.php');
    }

    //redirect function
    public function redirect($path) {
        header('location: ' . BASE_URL . '/public/html/' . $path);
    }
}