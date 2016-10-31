<?php
require_once realpath(__DIR__ . '/../init.php');

$db = Database::getInstance();

$customer = new Customers();
use \Respect\Validation\Validator as Validator;
if ($_POST['type'] == 'add customer') {

    if (!Validator::notEmpty()->validate($_POST['company_name']) ||
        !Validator::notEmpty()->validate($_POST['address_1']) ||
        !Validator::notEmpty()->validate($_POST['address_2']) ||
        !Validator::notEmpty()->validate($_POST['zipcode']) ||
        !Validator::phone()->validate($_POST['phone_number_1']) ||
        !Validator::phone()->validate($_POST['phone_number_2']) ||
        !Validator::email()->validate($_POST['email']) ||
        !Validator::phone()->validate($_POST['fax']) ||
        !Validator::notEmpty()->validate($_POST['contact_person']) ||
        !Validator::notEmpty()->validate($_POST['internal_contact_person']) ||
        !Validator::notEmpty()->validate($_POST['bank_nr']))
    {

        $user->redirect("customer/add_customer.php?message=Er is een veld verkeerd ingevult");

    }
    
    if($customer->addCustomer($_POST)) {
        $user->redirect('customer_list.php?message=klant toegevoegt');
    }
    
}

if( $_POST['type'] == 'edit customer') {

    if (!isset($_GET['customerid'])) {
        die("redirect to add_customer");
    }

    require_once realpath(__DIR__ . '/../variable/variableEditCustomer.php');

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

        $sql = "
        UPDATE `tbl_customers`
        SET company_name = :companyName,
            contact_person = :contactPerson,
            address_1 = :address,
            zipcode = :zipcode,
            phone_number_1 = :phoneNumber,
            fax = :fax,
            email = :email,
            potential_customer = :potentialCustomer
        WHERE customer_id = $customerID";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(":companyName", $editCompanyName);
        $stmt->bindParam(":contactPerson", $editContactPerson);
        $stmt->bindParam(":address", $editAdress);
        $stmt->bindParam(":zipcode", $editZipcode);
        $stmt->bindParam(":phoneNumber", $editPhone);
        $stmt->bindParam(":fax", $editFax);
        $stmt->bindParam(":email", $editEmail);
        $stmt->bindParam(":potentialCustomer", $editPotentialCustomer);

        $stmt->execute();

        $sql = " 
        UPDATE `tbl_appointments`
        INNER join `tbl_projects`
            on `tbl_projects`.project_id = `tbl_appointments`.project_id
        INNER join `tbl_customers`
            on `tbl_customers`.customer_id = `tbl_projects`.customer_id
    
        SET appointment_day = :appointmentDay,
            next_action = :nextAction
            WHERE `tbl_customers`.customer_id = $customerID 
    ";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(":appointmentDay", $editAppointmentDay);
        $stmt->bindParam(":nextAction", $editNextAction);
        $stmt->execute();

        $sql = "
        UPDATE `tbl_invoices`
        
        INNER join `tbl_projects`
          on `tbl_projects`.project_id = `tbl_invoices`.project_id
        INNER join `tbl_customers`
          on `tbl_customers`.customer_id = `tbl_projects`.customer_id
        
        SET invoice_nr = :invoiceNr
        
        WHERE `tbl_customers`.customer_id = $customerID
    ";
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(":invoiceNr", $editInvoiceNumber);
        $stmt->execute();
    }
    if($user->getUsername() === 'Finance')
    {
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
        $sql = "
        UPDATE `tbl_customers`
        LEFT JOIN `tbl_projects`
	        on `tbl_customers`.customer_id = `tbl_projects`.customer_id
        left join `tbl_invoices`
            on `tbl_invoices`.project_id = `tbl_projects`.project_id
        set 
            `tbl_customers`.bank_nr = :bankNr,
            `tbl_customers`.credit_balance = :creditBalance,
            `tbl_customers`.number_of_invoices = :nrInvoices,
            `tbl_customers`.gross_revenue = :grossRevenue,
            `tbl_customers`.limit = :limit,
            `tbl_customers`.ledger_account_number = :ledgerNr,
            `tbl_invoices`.tax = :tax
        WHERE `tbl_customers`.customer_id = $customerID
        ";
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':bankNr', $editBankAccountNr);
        $stmt->bindParam(':creditBalance', $editCreditBalance);
        $stmt->bindParam(':nrInvoices', $editNumberInvoices);
        $stmt->bindParam(':grossRevenue', $editGrossRevenue);
        $stmt->bindParam(':limit', $editLimit);
        $stmt->bindParam(':ledgerNr', $editLedgerAccountNr);
        $stmt->bindParam(':tax', $editTax);
        $stmt->execute();

        $message = 'Succesfull edited';
        $user->redirectMessage('customer_list.php', $message);

    }
}