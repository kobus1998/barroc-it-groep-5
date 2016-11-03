<?php


class Projects {

    private $db;

    public function __construct()
    {
        // Start database instance when new user is created
        $this->db = Database::getInstance();
    }

    public function getProjects($project_id)
    {
        $sql = "SELECT * FROM tbl_projects
                LEFT JOIN tbl_customers
                  on tbl_customers.customer_id = tbl_projects.customer_id
                WHERE project_id = :project_id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':project_id', $project_id);
        $stmt->execute();
        $GLOBALS['projectData'] = $stmt->fetchAll();
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

    public function editProject($project)
    {

        $db = Database::getInstance();

        $sql = "UPDATE `tbl_projects`
                SET `project_name` = :project_name,
                    `hardwaresoftware` = :hardwaresoftware,
                    `maintenance_contract` = :maintenance_contract,
                    `description` = :description
                WHERE `tbl_projects`.`project_id` = :id";

        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':project_name', $project['project_name']);
        $stmt->bindParam(':hardwaresoftware', $project['hardwaresoftware']);
        $stmt->bindParam(':maintenance_contract', $project['maintenance_contract']);
        $stmt->bindParam(':description', $project['description']);
        $stmt->bindParam(':id', $project['project_id']);

        if($stmt->execute()) {
            return true;
        }
        return false;

    }

    public function editProjectDate($project, $date)
    {

        $db = Database::getInstance();

        $sql = "UPDATE `tbl_projects`
                SET `deadline` = :deadline
                WHERE `project_id` = :id";
            
        $stmt = $db->pdo->prepare($sql);
        $stmt->bindParam(':deadline', $date);
        $stmt->bindParam(':id', $project['project_id']);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;

    }


}