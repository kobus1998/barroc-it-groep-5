<?php

require_once realpath(__DIR__ . '/../init.php');
$appointments = new Appointments();
use \Respect\Validation\Validator as Validator;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if($_POST['type'] == 'add appointment') {
        if(!Validator::notEmpty()->validate($_POST['appointment-day']) ||
            !Validator::notEmpty()->validate($_POST['next-action'])
        ) {
            echo 'kut';
            $messageWarning = "";
            $user->redirect();
        } else {
            $appointments->addAppointment($_POST);
            var_dump($_POST);
        }
    }
}