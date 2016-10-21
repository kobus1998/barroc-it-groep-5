<?php
require_once realpath(__DIR__ . '/../init.php');

$db = Database::getInstance();

require_once realpath(__DIR__ . '/../variable/variableEditCustomer.phpd');


if( $_POST['type'] == 'edit customer') {
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
            $message = '';
            $user->redirectMessage();
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
    if($user->getUsername() == 'Finance')
    {

    }
}