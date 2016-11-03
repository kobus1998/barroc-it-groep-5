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
        
        $sql = "INSERT INTO `tbl_customers` (company_name, address_1, address_2, zipcode, zipcode_2, phone_number_1, phone_number_2,
                                             email, fax, contact_person, internal_contact_person, bank_nr) 
                                             VALUES (:company_name, :address_1, :address_2, :zipcode, :zipcode_2, :phone_number_1, :phone_number_2,
                                             :email, :fax, :contact_person, :internal_contact_person, :bank_nr)";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':company_name', $customer['company_name']);
        $stmt->bindParam(':address_1', $customer['address_1']);
        $stmt->bindParam(':address_2', $customer['address_2']);
        $stmt->bindParam(':zipcode', $customer['zipcode']);
        $stmt->bindParam(':zipcode_2', $customer['zipcode_2']);
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