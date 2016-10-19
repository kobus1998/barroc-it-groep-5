<?php

session_start();

require_once realpath(__DIR__ . '/config.php');

//requires all vendor classes
require_once realpath(__DIR__ . '/../vendor/autoload.php');

//require all classes
spl_autoload_register( function($class) {

    if ( file_exists(__DIR__ . '/classes/' . $class . '.php') ) {

        require realpath(__DIR__ . '/classes/' . $class . '.php');

    }
});

$user = new User();
$customers = new Customers();

if(isset($_SESSION['user_id']))
{
    $db = Database::getInstance();
    $id = $_SESSION['user_id'];
    $userData = $db->pdo->query("SELECT `username`, `user_id` FROM `tbl_users` WHERE $id = `user_id`")
        ->fetch(PDO::FETCH_ASSOC);

    $user->setUser_ID($userData['user_id']);
    $user->setUsername($userData['username']);

}
?>