<?php require realpath(__DIR__ . '/../init.php');

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    if ($_GET['type'] == 'logout') {
        $user->logout();
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
            die;
        }

        $username = ucfirst($username);
        
        $db = Database::getInstance();
        $sql = "SELECT * FROM `tbl_users` WHERE :username = `username`";
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        $result = $stmt->rowCount();
        
        if($result = 0)
        {
            $message = 'wrong username';
            $user->redirectMessage('index.php', $message);
            die;
        }

        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $hashedPassword = $data->password;

        if (! password_verify($password, $hashedPassword) ) {
            $message = 'wrong password';
            $user->redirectMessage('index.php', $message);
            die;
        }

        $info = [
            'user_id'   => $data->user_id,
            'username'  => $data->username
        ];
        
        $user->login($info);
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
            die;
        } else if(strlen($password) < 5)
        {
            $message = "password too short";
            $user->redirectMessage('register.php', $message);
            die;
        } else if( $password != $passwordRepeat) 
        {
            $message = 'Password does not match with repeat password';
            $user->redirectMessage("register.php", $message);
            die;
        }

        $username = ucfirst($username);

        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $user->register($username, $password);
        $message = 'success';
        $user->redirectMessage('index.php', $message);
        
    }
}