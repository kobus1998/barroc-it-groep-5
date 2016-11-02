<?php

class Customers {
    
    private $db;
    private $company_name;
    private $address_1;
    private $address_2;
    private $zipcode;
    private $phone_number_1;
    private $phone_number_2;
    private $email;
    private $fax;
    private $contact_person;
    private $internal_contact_person;
    private $potential_customer;
    private $applications;
    private $bank_nr;
    private $limit;
    private $credit_balance;
    private $credit_worthy;
    private $ledger_account_number;
    private $gross_revenue;
    private $sales_percentage;
    private $number_of_invoices;
    private $last_contact_date;



    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    /**
     * 1. Alle klanten ophalen van de database
     * 2. Klanten filteren. Alleen de eerste 30 weergeven
     * 3. De query preparen tegen sql injectie
     *
     * Punten die ingevoerd moeten worden:
     * company_name
     * address_1
     * address_2
     * zipcode
     * phone_number_1
     * phone_number_2
     * email
     * fax
     * contact_person
     * internal_contact_person
     * bank_nr
     *
     */
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
        
        $sql = "INSERT INTO `tbl_customers` (company_name, address_1, address_2, zipcode, phone_number_1, phone_number_2,
                                             email, fax, contact_person, internal_contact_person, bank_nr) 
                                             VALUES (:company_name, :address_1, :address_2, :zipcode, :phone_number_1, :phone_number_2,
                                             :email, :fax, :contact_person, :internal_contact_person, :bank_nr)";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':company_name', $customer['company_name']);
        $stmt->bindParam(':address_1', $customer['address_1']);
        $stmt->bindParam(':address_2', $customer['address_2']);
        $stmt->bindParam(':zipcode', $customer['zipcode']);
        $stmt->bindParam(':phone_number_1', $customer['phone_number_1']);
        $stmt->bindParam(':phone_number_2', $customer['phone_number_2']);
        $stmt->bindParam(':email', $customer['email']);
        $stmt->bindParam(':fax', $customer['fax']);
        $stmt->bindParam(':contact_person', $customer['contact_person']);
        $stmt->bindParam(':internal_contact_person', $customer['internal_contact_person']);
        $stmt->bindParam(':bank_nr', $customer['bank_nr']);

        if($stmt->execute()) {
            return true;
        }
        return false;
        
    }

    public function filterCustomers() {



    }
}