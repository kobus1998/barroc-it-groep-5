<?php


class Quotation {

    private $db;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function getQuotations()
    {
        if (1 == 1) {
            $sql = "SELECT *
                FROM tbl_quotations
                ORDER BY quotation_id DESC
                LIMIT 30 ";
        }

        $stmt = $this->db->pdo->prepare($sql);
        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    public function addQuotation($quotation) {

        $db = Database::getInstance();

        $sql = "INSERT INTO `tbl_quotations` (customer_id, quotation_number, quotation_date, order_type, description) 
                                      VALUES (:id, :quotation_number, :quotation_date, :order_type, :description)";

        $sqlMail = "SELECT * FROM `tbl_customers`
                    WHERE `:customerId` = `customer_id`";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':id', $quotation['customer_id']);
        $stmt->bindParam(':quotation_number', $quotation['quotation_number']);
        $stmt->bindParam(':quotation_date', $quotation['quotation_date']);
        $stmt->bindParam(':order_type', $quotation['order_type']);
        $stmt->bindParam(':description', $quotation['description']);
        $stmtMail = $db->pdo->prepare($sqlMail);
        $stmt->bindParam(':customerId' , $quotation['customer_id']);

        if($stmt->execute()) {
            return true;
        }

    }

}