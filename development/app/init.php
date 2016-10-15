<?php

require_once realpath(__DIR__ . '/config.php');

//requires all vendor classes
//require_once realpath(__DIR__ . '/../vendor/respect/');

//require all classes
spl_autoload_register( function($class) {

    if ( file_exists(__DIR__ . '/classes/' . $class . '.php') ) {

        require realpath(__DIR__ . '/classes/' . $class . '.php');

    }
});

?>