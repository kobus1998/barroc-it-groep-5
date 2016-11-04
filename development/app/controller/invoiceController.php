<?php
require realpath(__DIR__ . '/../init.php');
use \Respect\Validation\Validator as Validator;

$invoice = new Invoices();
$projectId = $_GET['projectid'];

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['type'] == 'add invoice') {
        if( !Validator::numeric()->validate($_POST['invoice_nr']) ||
            !Validator::numeric()->validate($_POST['price']) ||
            !Validator::numeric()->validate($_POST['tax']))
        {
            $user->redirect('invoices/add_invoice.php');
            die;
        }
        $totalPrice = $_POST['price'] / 100 * (100 + $_POST['tax']);

        $invoice->addInvoice($_POST, $projectId, $totalPrice);
        $invoice->increaseNrInvoices($projectId);
        
        
    }
}