<?php

// sets up a session
session_start();

// require de config.php
require_once realpath(__DIR__ . '/config.php');

// require classes automatically
spl_autoload_register( function($class) {

    if ( file_exists(__DIR__ . '/classes/' . $class . '.php') ) {

        require realpath(__DIR__ . '/classes/' . $class . '.php');

    }
} );