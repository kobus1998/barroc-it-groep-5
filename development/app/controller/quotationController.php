<?php
require_once realpath(__DIR__ . '/../init.php');

$db = Database::getInstance();

$quotation = new Quotation();
use \Respect\Validation\Validator as Validator;
if ($_POST['type'] == 'add quotation') {

    if (!Validator::numeric()->validate($_POST['customer_id']) ||
        !Validator::notEmpty()->validate($_POST['quotation_number']) ||
        !Validator::notEmpty()->validate($_POST['quotation_date']) ||
        !Validator::notEmpty()->validate($_POST['order_type']))
    {

        $user->redirect("quotation/add_quotation.php?message=Some fields aren't filled in correctly");
        die;
    }

    if($quotation->addQuotation($_POST)) {
        $user->redirect('quotation_list.php?message=quotation added');
    }

}

if( $_POST['type'] == 'edit quotation') {

    if (!Validator::numeric()->validate($_POST['customer_id']) ||
        !Validator::numeric()->validate($_POST['quotation_id']) ||
        !Validator::numeric()->validate($_POST['quotation_number']) ||
        !Validator::notEmpty()->validate($_POST['quotation_date']) ||
        !Validator::notEmpty()->validate($_POST['order_type']) ||
        !Validator::notEmpty()->validate($_POST['description']))
    {
        $user->redirect("quotation_list.php?message=Something went wrong");
        die;
    }
    
    if ($quotation->editQuotation($_POST)) {
        $user->redirect('quotation_list.php?message=Quotation edited');
    } else {
        $user->redirect('quotation_list.php?message=Quotation edit failed');
    }
    
}