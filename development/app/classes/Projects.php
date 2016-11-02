<?php


class Projects {

    private $db;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function getProjects()
    {
        if (1 == 1) {
            $sql = "SELECT *
                FROM tbl_projects
                ORDER BY project_id DESC
                LIMIT 30 ";
        }

        $stmt = $this->db->pdo->prepare($sql);
        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    public function addProject($project, $date)
    {

        $db = Database::getInstance();

        $sql = "INSERT INTO `tbl_projects` (customer_id, project_name, deadline, hardwaresoftware, maintenance_contract, description) 
                                    VALUES (:customer_id, :project_name, :deadline, :hardwaresoftware, :maintenance_contract, :description)";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':customer_id', $project['customer_id']);
        $stmt->bindParam(':project_name', $project['project_name']);
        $stmt->bindParam(':deadline', $date);
        $stmt->bindParam(':hardwaresoftware', $project['hardwaresoftware']);
        $stmt->bindParam(':maintenance_contract', $project['maintenance_contract']);
        $stmt->bindParam(':description', $project['description']);

        if($stmt->execute()) {
            return true;
        }
        return false;

    }


}