<?php require realpath(__DIR__ . '/../init.php');

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    if ($_GET['type'] == 'logout') {
        $user->logout();
        $user->redirect('index.php');
    }
}

if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
    var_dump($_POST);
    if($_POST['type'] == 'login' ) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password))
        {
            $message = 'Some fields are empty';
            $user->redirectMessage("index.php", $message);
        }
    }

    if($_POST['type'] == 'register' )
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['password-repeat'];

        if(empty($username) || empty($password) || empty($passwordRepeat)) 
        {
            $message = 'Some fields are empty';
            $user->redirectMessage("register.php", $message);
        } else if(strlen($password) < 5)
        {
            $message = "password too short";
            $user->redirectMessage('register.php', $message);
        } else if( $password != $passwordRepeat) 
        {
            $message = 'Password does not match with repeat password';
            $user->redirectMessage("register.php", $message);
        }


        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $user->register($username, $password);
        
    }
}