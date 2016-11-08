<?php

/**
 * Created by PhpStorm.
 * User: kobus
 * Date: 11/8/2016
 * Time: 12:14 PM
 */
class Appointments
{

    private $db;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function addAppointment($method) {
        
        $sql = "INSERT INTO `tbl_appointments` 
                (`tbl_appointments`.appointment_day, `tbl_appointments`.next_action, tbl_appointments.customer_id)
                VALUES (:appointmentDay, :nextAction, :customerId)";
        $db = Database::getInstance();
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':appointmentDay', $method['appointment-day']);
        $stmt->bindParam(':nextAction', $method['next-action']);
        $stmt->bindParam(':customerId', $_GET['customerid']);
        $stmt->execute();
    }

    public function lastContactDate($id) {
        $db = Database::getInstance();
        $result = $db->pdo->query("SELECT appointment_day FROM `tbl_appointments` 
                WHERE customer_id = $id ORDER BY appointment_day DESC limit 1")
            ->fetchAll(PDO::FETCH_ASSOC);

        var_dump($result);

        $lastContactDate = $result[0]['appointment_day'];

        $sql = "UPDATE `tbl_customers` SET last_contact_date = '$lastContactDate'
                WHERE customer_id = $id";
        $db->pdo->prepare($sql)->execute();
    }
}