<?php require realpath(__DIR__ . '/../init.php');


if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if($_POST['type'] == 'login' ) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(empty($username) || empty($password)) 
        {
            $user->redirect('index.php');
        }
    }
}