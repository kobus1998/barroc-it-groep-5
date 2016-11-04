<?php

class Customers {
    
    private $db;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function getCustomers($customer_id) 
    {
        $sql = "SELECT *
                FROM tbl_customers
                WHERE customer_id = :customer_id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->execute();
        $GLOBALS['customerData'] = $stmt->fetchAll();
      }
    
    public function addCustomer($customer) {

        $db = Database::getInstance();
        
        $sql = "INSERT INTO `tbl_customers` (company_name, address_1, address_2, zipcode, zipcode_2, city, city_2, phone_number_1, phone_number_2,
                                             email, fax, contact_person, internal_contact_person, initials, bank_nr) 
                                             VALUES (:company_name, :address_1, :address_2, :zipcode, :zipcode_2, :city, :city_2, :phone_number_1, :phone_number_2,
                                             :email, :fax, :contact_person, :internal_contact_person, :initials, :bank_nr)";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':company_name', $customer['company_name']);
        $stmt->bindParam(':address_1', $customer['address_1']);
        $stmt->bindParam(':address_2', $customer['address_2']);
        $stmt->bindParam(':zipcode', $customer['zipcode']);
        $stmt->bindParam(':zipcode_2', $customer['zipcode_2']);
        $stmt->bindParam(':city', $customer['city']);
        $stmt->bindParam(':city_2', $customer['city_2']);
        $stmt->bindParam(':phone_number_1', $customer['phone_number_1']);
        $stmt->bindParam(':phone_number_2', $customer['phone_number_2']);
        $stmt->bindParam(':email', $customer['email']);
        $stmt->bindParam(':fax', $customer['fax']);
        $stmt->bindParam(':contact_person', $customer['contact_person']);
        $stmt->bindParam(':internal_contact_person', $customer['internal_contact_person']);
        $stmt->bindParam(':initials', $customer['initials']);
        $stmt->bindParam(':bank_nr', $customer['bank_nr']);

        if($stmt->execute()) {
            return true;
        }
        return false;
        
    }

    public function filterCustomers() {



    }

    public function editCustomerSales($customerID, $method) {
        $sql = "
        UPDATE `tbl_customers`
        SET `company_name` = :companyName,
            contact_person = :contactPerson,
            initials = :initials,
            address_1 = :address,
            address_2 = :address2,
            city = :city,
            city_2 = :city2,
            zipcode = :zipcode,
            zipcode_2 = :zipcode2, 
            phone_number_1 = :phoneNumber,
            phone_number_2 = :phoneNumber2,
            fax = :fax,
            email = :email,
            potential_customer = :potentialCustomer
        WHERE customer_id = $customerID";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":companyName", $method['edit-company-name']);
        $stmt->bindParam(":contactPerson", $method['edit-contact-person']);
        $stmt->bindParam(":initials", $method['edit-initials']);
        $stmt->bindParam(":address", $method['edit-adress']);
        $stmt->bindParam(":address2", $method['edit-adress-2']);
        $stmt->bindParam(":city", $method['edit-city']);
        $stmt->bindParam(":city2", $method['edit-city-2']);
        $stmt->bindParam(":zipcode", $method['edit-zipcode']);
        $stmt->bindParam(":zipcode2", $method['edit-zipcode-2']);
        $stmt->bindParam(":phoneNumber", $method['edit-phone-number']);
        $stmt->bindParam(":phoneNumber2", $method['edit-phone-number2']);
        $stmt->bindParam(":fax", $method['edit-fax']);
        $stmt->bindParam(":email", $method['edit-email']);
        $stmt->bindParam(":potentialCustomer", $method['potential_customer']);

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

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":appointmentDay", $method['edit-appointment-day']);
        $stmt->bindParam(":nextAction", $method['edit-next-action']);
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
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(":invoiceNr", $method['edit-invoice-number']);
        $stmt->execute();

    }

    public function editCustomerFinance($customerID, $method) {
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
            `tbl_invoices`.tax = :tax,
            `tbl_customers`.credit_worthy = :creditWorthy
        WHERE `tbl_customers`.customer_id = $customerID
        ";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':bankNr', $method['edit-bank-account-number']);
        $stmt->bindParam(':creditBalance', $method['edit-credit-balance']);
        $stmt->bindParam(':nrInvoices', $method['edit-number-invoices']);
        $stmt->bindParam(':grossRevenue', $method['edit-gross-revenue']);
        $stmt->bindParam(':limit', $method['edit-limit']);
        $stmt->bindParam(':ledgerNr', $method['edit-ledger-account-number']);
        $stmt->bindParam(':tax', $method['edit-tax-code']);
        $stmt->bindParam(':creditWorthy', $method['credit_worthy']);
        $stmt->execute();
    }
}