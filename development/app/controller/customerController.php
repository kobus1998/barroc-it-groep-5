<?php
require_once realpath(__DIR__ . '/../init.php');
require_once realpath(__DIR__ . '/../variable/variableEditCustomer.php');

$db = Database::getInstance();

$customer = new Customers();
use \Respect\Validation\Validator as Validator;
if ($_POST['type'] == 'add customer') {

    if (!Validator::notEmpty()->validate($_POST['company_name']) ||
        !Validator::notEmpty()->validate($_POST['address_1']) ||
        !Validator::notEmpty()->validate($_POST['zipcode']) ||
        !Validator::phone()->validate($_POST['phone_number_1']) ||
        !Validator::email()->validate($_POST['email']) ||
        !Validator::notEmpty()->validate($_POST['contact_person']) ||
        !Validator::notEmpty()->validate($_POST['internal_contact_person']) ||
        !Validator::notEmpty()->validate($_POST['bank_nr']))
    {
        $message = "Some fields are empty";
        $user->redirectMessage("customer/add_customer.php", $message);
        die;
    }
    
    if($customer->addCustomer($_POST)) {
        $message = "Customer is created";
        $user->redirectMessage('customer_list.php', $message);
    }
    
}

if( $_POST['type'] == 'edit customer') {

    if (!isset($_GET['customerid'])) {
        $message = "No customer is selected";
        $user->redirectMessage('customer/add_customer', $message);
        die("redirect to add_customer");
    }

    if( !isset($_POST['edit-potential-customer']) ) {
        $editPotentialCustomer = 0;
    } else {
        $editPotentialCustomer = 1;
    }

    $customerID = $_GET['customerid'];
    if( $user->getUsername() == 'Sales')
    {
        if (
            empty($editCompanyName) ||
            empty($editContactPerson) ||
            empty($editAdress) ||
            empty($editZipcode) ||
            empty($editPhone) ||
            empty($editFax) ||
            empty($editEmail) )
        {
            $message = 'Some required fields are empty';
            $user->redirectMessage("../customer/editcustomer.php?editcustomer=$customerID", $message);
            die;
        }

        $customer->editCustomerSales($customerID, $_POST);

        $message = "Customer edited";
        $user->redirectMessage('customer_list.php', $message);
    }
    if($user->getUsername() === 'Finance')
    {
        if( !isset($_POST['edit-credit-worthy']) ) {
            $editCreditWorthy = 0;
        } else {
            $editCreditWorthy = 1;
        }

        if(
            empty($editBankAccountNr) ||
            empty($editCreditBalance) ||
            empty($editNumberInvoices) ||
            empty($editGrossRevenue) ||
            empty($editLimit) ||
            empty($editLedgerAccountNr) ||
            empty($editTax)
        ) {
            $message = 'some required fields are empty';
            $user->redirectMessage("customer_list.php", $message);
        }

        $customer->editCustomerFinance($customerID);

        $message = 'Customer edited';
        $user->redirectMessage('customer_list.php', $message);

    }
}