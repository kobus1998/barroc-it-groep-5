<?php


class Quotation {

    private $db;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function addQuotation($quotation) {

        $db = Database::getInstance();

        $sql = "INSERT INTO `tbl_quotations` (customer_id, quotation_number, quotation_date, order_type, description) 
                                      VALUES (:id, :quotation_number, :quotation_date, :order_type, :description)";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':id', $quotation['customer_id']);
        $stmt->bindParam(':quotation_number', $quotation['quotation_number']);
        $stmt->bindParam(':quotation_date', $quotation['quotation_date']);
        $stmt->bindParam(':order_type', $quotation['order_type']);
        $stmt->bindParam(':description', $quotation['description']);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    public function editQuotation($quotation) {

        $db = Database::getInstance();

        $sql = "UPDATE `tbl_quotations`
                SET `quotation_number` = :quotation_number, `quotation_date` = :quotation_date, `order_type` = :order_type, `description` = :description
                WHERE `quotation_id` = :quotation_id";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':quotation_id', $quotation['quotation_id']);
        $stmt->bindParam(':quotation_number', $quotation['quotation_number']);
        $stmt->bindParam(':quotation_date', $quotation['quotation_date']);
        $stmt->bindParam(':order_type', $quotation['order_type']);
        $stmt->bindParam(':description', $quotation['description']);

        if($stmt->execute()) {
            return true;
        }
        return false;
        
    }

}