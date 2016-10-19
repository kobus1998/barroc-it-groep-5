<?php require realpath(__DIR__ . '/../init.php');

/*
 *  When request method is get
 */
if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    /*
     * When type = logout
     */
    if ($_GET['type'] == 'logout') {
        $user->logout();
    }
}

/*
 * When request method is POST
 */
if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
    /*
     * When type is login
     */
    if($_POST['type'] == 'login' ) 
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        /*
         * if username or password is empty
         */
        if(empty($username) || empty($password))
        {
            $message = 'Some fields are empty';
            $user->redirectMessage("index.php", $message);
            die;
        }
        // first letter capitalised
        $username = ucfirst($username);
        // database connection
        // Select everything from username
        $db = Database::getInstance();
        $sql = "SELECT * FROM `tbl_users` WHERE :username = `username`";
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        //count rows
        $result = $stmt->rowCount();

        /*
         * If rowCount is 0
         */
        if($result = 0)
        {
            $message = 'wrong username';
            $user->redirectMessage('index.php', $message);
            die;
        }

        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $hashedPassword = $data->password;
        // verify the hashed password
        if (! password_verify($password, $hashedPassword) ) {
            $message = 'wrong password';
            $user->redirectMessage('index.php', $message);
            die;
        }
        // Information into array
        $info = [
            'user_id'   => $data->user_id,
            'username'  => $data->username
        ];
        // use function login
        $user->login($info);
    }
    /*
     * if type is register
     */
    if($_POST['type'] == 'register' )
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['password-repeat'];
        // if any of the fields are empty
        if(empty($username) || empty($password) || empty($passwordRepeat)) 
        {
            $message = 'Some fields are empty';
            $user->redirectMessage("register.php", $message);
            die;
            // if password is less then 5 chars
        } else if(strlen($password) < 5)
        {
            $message = "password too short";
            $user->redirectMessage('register.php', $message);
            die;
            // if password is not the same as password-repeat
        } else if( $password != $passwordRepeat) 
        {
            $message = 'Password does not match with repeat password';
            $user->redirectMessage("register.php", $message);
            die;
        }
        // capitalise the first letter
        $username = ucfirst($username);
        // hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        // use function register
        $user->register($username, $password);
        $message = 'success';
        $user->redirectMessage('index.php', $message);
        
    }
}