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

if(isset($_SESSION['user_id']))
{
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `tbl_users` WHERE :id = `user_id`";
}
?>