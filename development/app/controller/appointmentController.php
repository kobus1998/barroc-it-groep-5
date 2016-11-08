<?php

require_once realpath(__DIR__ . '/../init.php');
$appointments = new Appointments();
use \Respect\Validation\Validator as Validator;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if($_POST['type'] == 'add appointment') {
        $customerid = $_GET['customerid'];
        if(!Validator::notEmpty()->validate($_POST['appointment-day']) ||
            !Validator::notEmpty()->validate($_POST['next-action'])
        ) {
            $messageWarning = "Some fields are not filled in";
            $user->redirect("appointments/add_appointment.php?customerid=$customerid&messageDanger=$messageWarning");
        } else {
            $appointments->addAppointment($_POST);
            $user->redirect("customer/info_customer?customerid=$customerid");
        }
    }
}