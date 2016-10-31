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


}