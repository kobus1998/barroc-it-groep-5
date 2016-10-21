<?php
require_once realpath(__DIR__ . '/../init.php');

$db = Database::getInstance();

//url customer id
$customerID = $_GET['customerid'];

//tbl customer
$editCompanyName = $_POST['edit-company-name'];
$editContactPerson = $_POST['edit-contact-person'];
$editAdress = $_POST['edit-adress'];
$editZipcode = $_POST['edit-zipcode'];
$editPhone = $_POST['edit-phone-number'];
$editFax = $_POST['edit-fax'];
$editEmail = $_POST['edit-email'];
$editPotentialCustomer = $_POST['edit-potential-customer'];
$editLastContact = $_POST['edit-last-contact-date'];

//tbl invoices
$editInvoiceNumber = $_POST['edit-invoice-number'];
$editOfferStatus = $_POST['edit-offer-status'];

//tbl appointments
$editAppointmentDay = $_POST['edit-appointment-day'];
$editNextAction = $_POST['edit-next-action'];

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
    }