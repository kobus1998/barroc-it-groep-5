<?php require realpath(__DIR__ . '/../init.php');

use \Respect\Validation\Validator as Validator;

$db = Database::getInstance();

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
        /*
         * first letter capitalised
         */

        $username = ucfirst($username);
        /*
         * database connection
         * Select everything from username
         */
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
            $message = 'Username doesn\' exist yet';
            $user->redirectMessage('index.php', $message);
            die;
        }

        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $hashedPassword = $data->password;
        /*
         * verify the hashed password
         */
        if (! password_verify($password, $hashedPassword) ) {
            $message = 'wrong password';
            $user->redirectMessage('index.php', $message);
            die;
        }
        /*
         *  Information into array
         */
        $info = [
            'user_id'   => $data->user_id,
            'username'  => $data->username
        ];
        /*
         *use function login
         */
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
        /*
         *  if any of the fields are empty
         */
        if(empty($username) || empty($password) || empty($passwordRepeat)) 
        {
            $message = 'Some fields are empty';
            $user->redirectMessage("register.php", $message);
            die;
            /*
             *  if password is less then 5 chars
             */
        } else if(strlen($password) < 5)
        {
            $message = "password too short";
            $user->redirectMessage('register.php', $message);
            die;
            /*
             *  if password is not the same as password-repeat
             */
        } else if( $password != $passwordRepeat) 
        {
            $message = 'Password and repeat password does not match';
            $user->redirectMessage("register.php", $message);
            die;
        }
        /*
         *  capitalise the first letter
         */
        $username = ucfirst($username);
        /*
         *  hash the password
         */
        $password = password_hash($password, PASSWORD_DEFAULT);
        /*
         *  use function register
         */
        $user->register($username, $password);
        $message = 'successful registered';
        $user->redirectMessage('register.php', $message);
        
    }
    
    if ($_POST['type'] == 'change password') {

        if
        (
            !Validator::numeric()->validate($_POST['user_id']) ||
            !Validator::notEmpty()->validate($_POST['username']) ||
            !Validator::notEmpty()->validate($_POST['password']) ||
            !Validator::notEmpty()->validate($_POST['new-password']) ||
            !Validator::notEmpty()->validate($_POST['new-password-repeat'] ||
            !$_POST[0]['user_id'] == $oldUser[0]['user_id'] ||
            !$_POST[0]['username'] == $oldUser[0]['username'])
        ) {
            $user->redirect("user_list.php?message=Something went wrong");
            die;
        }

        $sqlUser = "SELECT * FROM `tbl_users` WHERE user_id = :user_id";

        $stmtUser = $db->pdo->prepare($sqlUser);
        $stmtUser->bindParam(':user_id', $_POST['user_id']);
        $stmtUser->execute();

        $oldUser = $stmtUser->fetch();

        if (!password_verify($_POST['password'], $oldUser['password'])) {
            $user->redirect("user_list.php?message=Old password does not match");
            die;
        }
        if (!$_POST['new-password'] == $_POST['new-password-repeat']) {
            $user->redirect("user_list.php?message=New password does not match");
            die;
        }
        
        $password = password_hash($_POST['new-password'], PASSWORD_DEFAULT);

        $sql = "UPDATE tbl_users SET password = :password";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $user->redirect("user_list.php?message=Password changed");
        }

    }
}