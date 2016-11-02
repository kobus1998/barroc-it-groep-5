<?php
require_once realpath(__DIR__ . '/../init.php');

$db = Database::getInstance();

$project = new Projects();
use \Respect\Validation\Validator as Validator;

if ($_POST["type"] == "add project") {

    if (!Validator::numeric()->validate($_POST['customer_id']) ||
        !Validator::notEmpty()->validate($_POST['project_name']) ||
        !Validator::notEmpty()->validate($_POST['description']) ||
        !Validator::notEmpty()->validate($_POST['hardwaresoftware']) ||
        !Validator::notEmpty()->validate($_POST['maintenance_contract']) ||
        !Validator::notEmpty()->validate($_POST['day']) ||
        !Validator::notEmpty()->validate($_POST['month']) ||
        !Validator::notEmpty()->validate($_POST['year']))
    {
        $user->redirect("customer/add_customer.php?message=Something went wrong");
        die;
    }

    $date = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];

    if($project->addProject($_POST, $date)) {
        $user->redirect('project_list.php?message=Project added');
    }
    
}

if ($_POST["type"] == "edit project") {
    
}