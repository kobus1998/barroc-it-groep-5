<?php
require_once realpath(__DIR__ . '/../init.php');

$db = Database::getInstance();

$quotation = new Quotations();
use \Respect\Validation\Validator as Validator;
if ($_POST['type'] == 'add quotation') {

    if (!Validator::notEmpty()->validate($_POST['quotation_number']) ||
        !Validator::notEmpty()->validate($_POST['quotation_date']) ||
        !Validator::notEmpty()->validate($_POST['order_type']))
    {

        $user->redirect("quotation/add_quotation.php?message=Some fields aren't filled in correctly");
        die;
    }

    if($quotation->addQuotation($_POST)) {
        $user->redirect('customer_list.php?message=quotation added');
    }

}

if( $_POST['type'] == 'edit quotation') {

    if (!isset($_GET['quotation_id'])) {
        die("redirect to add_quotation");
    }

    require_once realpath(__DIR__ . '/../variable/variableEditQuotation.php');

    $customerID = $_GET['quotation_id'];
    if( $user->getUsername() == 'Sales')
    {
        if (
            empty($editQuotationNumber) ||
            empty($editQuotationDate) ||
            empty($editOrderType) )
        {
            $message = 'Some required fields are empty';
            $user->redirectMessage("../customer/editcustomer.php?editcustomer=$customerID", $message);
            die;
        }

        $sql = "
        UPDATE `tbl_quotations`
        SET quotation_number = :quotationNumber,
            quotation_date = :quotationDate,
            order_type = :orderType
        WHERE quotation_id = $quotationID";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(":quotationNumber", $editQuotationNumber);
        $stmt->bindParam(":quotationDate", $editQuotationDate);
        $stmt->bindParam(":orderType", $editOrderType);

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