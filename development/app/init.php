<?php

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

if(isset($_SESSION['id']))
{
    
    $id = $_SESSION['id'];
    $userData = Database::getInstance()->pdo->query("SELECT * FROM /*`table`*/ WHERE id = $id")
        ->fetchALL(PDO::FETCH_ASSOC);

    $user->username = $userData['username'];


}
?>