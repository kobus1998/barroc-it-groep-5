<?php
require realpath(__DIR__ . '/../init.php');
use \Respect\Validation\Validator as Validator;

$invoice = new Invoices();
if(isset($_GET['projectid'])) {
    $projectId = $_GET['projectid'];
}

if(isset($_GET['invoiceid'])) {
    $invoiceId = $_GET['invoiceid'];
}

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['type'] == 'add invoice') {
        if( !Validator::numeric()->validate($_POST['invoice_nr']) ||
            !Validator::notEmpty()->validate($_POST['price']) ||
            !Validator::numeric()->validate($_POST['tax']))
        {
            $user->redirect("invoices/add_invoice.php?projectid=$projectId&message=Something is not filled it");
            die;
        }
        $totalPrice = $_POST['price'] / 100 * (100 + $_POST['tax']);

        $invoice->addInvoice($_POST, $projectId, $totalPrice);
        $invoice->increaseNrInvoices($projectId);
        $invoice->increaseCustomerBalance($projectId, $totalPrice);

        $message = 'invoice added';
        $user->redirectMessage('invoice_list.php', $message);
        
    }
    
    if($_POST['type'] == 'edit invoice') {
        var_dump($_POST);

        $totalPrice = $_POST['price'] / 100 * (100 + $_POST['tax']);
        
        $invoice->editInvoice($invoiceId);
        $invoice->decreaseCustomerBalance($invoiceId, $totalPrice);
        $message = "Invoice is paid";
        $user->redirect("invoice_list.php?messageSuccess=$message");
    }
}