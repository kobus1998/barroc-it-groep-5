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
            $appointments->lastContactDate($customerid);
            $user->redirect("customer/info_customer?customerid=$customerid");
        }
    }
    if($_POST['type'] == 'edit appointment') {
        $customerid = $_GET['customerid'];
        $appointmentid = $_GET['appointmentid'];
        var_dump($_POST);
        if(!Validator::notEmpty()->validate($_POST['edit-appointment-day']) ||
            !Validator::notEmpty()->validate($_POST['edit-next-action'])
        ) {
            $messageWarning = "Some fields are not filled in";
            $user->redirect("appointments/edit_appointment.php?customerid=$customerid&messageDanger=$messageWarning");
        } else {
            $appointments->editAppointment($_POST, $appointmentid);
            $appointments->lastContactDate($customerid);
            $user->redirect("customer/info_customer?customerid=$customerid");
        }
    }
}