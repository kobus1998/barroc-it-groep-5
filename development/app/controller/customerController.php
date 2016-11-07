<?php
require_once realpath(__DIR__ . '/../init.php');
//require_once realpath(__DIR__ . '/../variable/variableEditCustomer.php');

$db = Database::getInstance();
$customerID = $_GET['customerid'];
$customer = new Customers();
use \Respect\Validation\Validator as Validator;
if ($_POST['type'] == 'add customer') {

    if (!Validator::notEmpty()->validate($_POST['company_name']) ||
        !Validator::notEmpty()->validate($_POST['address_1']) ||
        !Validator::notEmpty()->validate($_POST['zipcode']) ||
        !Validator::notEmpty()->validate($_POST['city']) ||
        !Validator::phone()->validate($_POST['phone_number_1']) ||
        !Validator::email()->validate($_POST['email']) ||
        !Validator::notEmpty()->validate($_POST['contact_person']) ||
        !Validator::notEmpty()->validate($_POST['internal_contact_person']) ||
        !Validator::notEmpty()->validate($_POST['initials']) ||
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

        require_once realpath(__DIR__ . '/../variable/variableEditCustomer.php');

        if (!isset($_POST['edit-potential-customer'])) {
            $editPotentialCustomer = 0;
        } else {
            $editPotentialCustomer = 1;
        }

        $customerID = $_GET['customerid'];
        if ($user->getUsername() == 'Sales') {
            if (
                !Validator::notEmpty()->validate($_POST['edit-company-name']) ||
                !Validator::notEmpty()->validate($_POST['edit-contact-person']) ||
                !Validator::notEmpty()->validate($_POST['edit-adress']) ||
                !Validator::notEmpty()->validate($_POST['edit-city']) ||
                !Validator::notEmpty()->validate($_POST['edit-zipcode']) ||
                !Validator::notEmpty()->validate($_POST['edit-phone-number']) ||
                !Validator::notEmpty()->validate($_POST['edit-email']) ||
                !Validator::notEmpty()->validate($_POST['edit-initials'])
            ) {
                $message = 'Some required fields are empty';
                $user->redirectMessage("../customer/editcustomer.php?editcustomer=$customerID", $message);
                die;
            }

            $customer->editCustomerSales($customerID, $_POST);

            $message = "Customer edited";
            $user->redirectMessage('customer_list.php', $message);
        }
        if ($user->getUsername() === 'Finance') {


            if (
                !Validator::notEmpty()->validate($_POST['edit-bank-account-number']) ||
                !Validator::notEmpty()->validate($_POST['edit-credit-balance']) ||
                !Validator::notEmpty()->validate($_POST['edit-gross-revenue']) ||
                !Validator::notEmpty()->validate($_POST['edit-limit']) ||
                !Validator::notEmpty()->validate($_POST['edit-ledger-account-number']) ||
                !Validator::notEmpty()->validate($_POST['edit-tax-code'])

            ) {
                $message = "some required fields are empty";
                $user->redirect("customer/edit_customer.php?customerid=$customerID&messageDanger=$message");
            }

            $customer->editCustomerFinance($customerID, $_POST);
            $message = 'Customer edited';
            $user->redirectMessage('customer_list.php', $message);

        }
    }
}