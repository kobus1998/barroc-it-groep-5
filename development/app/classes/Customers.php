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
    public function getCustomers() 
    {
        if (1 == 1) {
            $sql = "SELECT alles behalve dat wat dev niet mag zien
                FROM tbl_customers
                ORDER BY customer_id DESC
                LIMIT 30 ";
        }

        $stmt = $this->db->pdo->prepare($sql);
        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    public function filterCustomers() {



    }
}